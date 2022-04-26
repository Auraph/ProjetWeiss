<?php
session_start();
//if(isset($_SESSION['cookie']) && $_SESSION['cookie']=="true"){ }?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connexion</title>
	<script type="text/javascript" src="#"></script>
	<link rel="icon" href="../logo.ico" />
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<header>
    <img class="logoH" src="images/OPENéduc_logo.png">
    <div class="menu">
        <a class='lienHeader' href="ListeEcole.php">Ecoles</a>
        <a class='lienHeader' href="APropos.php">A Propos</a>
    </div>
</header>
<body>
	<div class="block"><h1>Connexion</h1>
		<form method="POST" action="ConnexionPHP.php">
			<p>Identifiant</p>
			<input class="champs"  type="text" id="adressem" name="identifiant" required size="55">

			<p>Mot de Passe</p>
			<input class="champs"  type="password" id="mdp" name="mdp" required size="48">

			<input class="button" type="submit" id="boutonConnect" value="Se Connecter"></input>

		</form>

	</div>

<div class="erreur"><p><?php 
if(isset($_SESSION['error_connexion'])){
echo($_SESSION['error_connexion']);}?></p></div>
<?php unset($_SESSION['error_connexion']); ?>
</body>
<footer class='footerG'>
    <div class="bande"></div>
    <div class="footer">
        <img class="logo" src="images/OPENéduc_logo.png">
        <img class="logo" src="images/AlsaNum_logo.png">
        <a class='lienHeader' href="APropos.php">Mentions Légales</a>
    </div>
</footer>
</html>