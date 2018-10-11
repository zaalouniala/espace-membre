<?php
// inscription

// Vérification de la validité des informations

if(isset($_POST['inscrire'])){
if (!empty($_POST['Nom']) and !empty($_POST['pseudo']) and !empty($_POST['email']) and !empty($_POST['pwd']) and !empty($_POST['pwd1']) and !empty($_POST['chek'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        if ($_POST['pwd'] = $_POST['pwd1']) {
            //connexion base de donnes
            // creation d'u nouveau utulisateure
            $bdd = new PDO('mysql:host=localhost;dbname=espacemembre;charset=utf8', 'root', '');
            $pass_hache = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
            $token=sha1(+$_POST['email']+time());
              // Insertion
            $req = $bdd->prepare('INSERT INTO membres( Nom,pseudo, pwd, email, dateINS, token) VALUES(:Nom, :pseudo, :pass, :email, CURDATE(), :token)');
            $req->execute(array(
                'Nom' => $_POST['Nom'],
                'pseudo' => $_POST['pseudo'],
                'email' => $_POST['email'],
                'pass' => $pass_hache,
                'token'=> $token));
            //select token dan la base de donner


//Si le mail existe

//Créer le message a envoyer par mail avec un lien menant vers la page permettant la modification de mot de passe
//Envoyer le mail
//Rediriger vers une page confirmant l'envoie d'email

                $pseudo = $_POST["pseudo"];
                $email=$_POST['email'];
                $header = "MIME-Version: 1.0\r\n";
                $header .= 'From:"zaalouni"<membership@validation.tn>' . "\n";
                $header .= 'Content-Type: text/html; charset="UTF-8"' . "\n";
                $header .= 'Content-Transfer-Encoding:8bit';
                $message = '
           <h1> Bienvenue sur VotreSite</h1>

           <p> Pour activer votre compte, veuillez cliquer sur le lien ci dessous ou copier/coller dans votre navigateur internet.</p>
           <a href="http://localhost/projets/espace%20membre/connecter.php?pseudo=' . urlencode($pseudo) . '&token=' . urlencode($token) . ' ">cliquez ici pour valider votre inscription</a>
           ---------------
           Bonjour: Ceci est un mail automatique, Merci de ne pas y répondre.';

                mail("$email", 'Validation EMail', $message, $header);
                header("location:connecter.php");





        } else {
            echo "mot de passe non valide";
        }


    } else {
        echo "Cet email a un format non valide.";
    }

}
else {
    echo " il y a un champ vide";
}


}




?>