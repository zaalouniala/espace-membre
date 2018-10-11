<?php
session_start();
if (isset($_GET["pseudo"]) and isset($_GET["token"])) {
    $pseudo = $_GET["pseudo"];
    $token = $_GET["token"];
    //Verification existance de l'email sur la base de données
    //select token dan la base de donner
    $bdd = new PDO('mysql:host=localhost;dbname=espacemembre;charset=utf8', 'root', '');


    $req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo and token= :token');
    $req->execute(array(
        'pseudo' => $pseudo,
        'token' => $token));
    $resultat = $req->fetch();

    if (!$resultat) {
        $_SESSION['resultChange'] = "lien non valide";
        header("location:connecter.php");
    }
    $_SESSION['pseudoChange'] = $pseudo;

}
else{
    header("location:connecter.php");
}
if (isset($_POST["changer"])) {
    if(!empty($_POST['pwd'])and !empty($_POST['pwd1'])){


    if ($_POST['pwd'] = $_POST['pwd1']) {
        $pwd_hashe = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        $newtoken = sha1(+$pseudo + time());
        $req = $bdd->prepare('UPDATE  membres SET pwd=:pwd_hashe,token= :token WHERE pseudo= :pseudo');
        $req->execute(array(
                'pwd_hashe' => $pwd_hashe,
                'pseudo' => $_SESSION['pseudoChange'],
                'token' => $newtoken));
                  unset($_SESSION['pseudoChange']);
                $_SESSION['resultChange']="mot de de passe change";
                header("location:connecter.php");
            }
            else{
                echo "erreur mot de passe";
            }

    }
}


?>
<fieldset>
    <legend> Changer Mot de passe oublié</legend>

    <form action="" method="post">
        <label for="">nouveau mot de passe</label><br>
        <input type="password" class="form-control" name="pwd" placeholder="nouveau mot de passe"><br>
        <label for="">confirmer mot de passe</label><br>
        <input type="password" class="form-control" name="pwd1" placeholder="confirmet nouveau mot de passe"><br>
        <input type="submit" name="changer"><br>
    </form>
</fieldset>



