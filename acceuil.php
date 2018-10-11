<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Espace Membre </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<link rel="stylesheet" href="style4.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="acceuil.php">ESPACE MEMBRE</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="acceuil.php">Home</a></li>
      <li><a href="acceuil.php">ACCEUIL</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">

      <li><a href="deconnexion.php"><span class="glyphicon glyphicon-log-in"></span> SE DECONNECTER</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <div class="presentation">
    <div class="contenu ">
    <h1><?= $_SESSION['pseudo'] ?> </h1>
    <h4><?= $_SESSION['message'] ?> </h4>
   </div>
  </div>
  <div class="newsletter">
    <h1>Newsletter</h1>
    <p> Abonnez-vous à notre newsletterpour les dernières nouvelles, </p>
    <p>promotions et offres</p>
    <form class="form-inline">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
    </form>
  </div>
    
       
  
</div> 

 

<div class="w3-bar w3-black w3-hide-small social">
    <p>2018 Tous les droits sont reservés. Site crée par ZAALOUNI ALA</p>
   <div>
    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-facebook-official"></i></a>
    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-instagram"></i></a>
    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-snapchat"></i></a>
    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-flickr"></i></a>
    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-twitter"></i></a>
    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-linkedin"></i></a>
  </div>
  
 

  
 

</body>
</html>
