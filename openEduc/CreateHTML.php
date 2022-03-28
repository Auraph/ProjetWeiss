<?php
session_start();
//if(isset($_SESSION['cookie']) && $_SESSION['cookie']=="true"){ }?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INSCRIPTION</title>
	<script type="text/javascript" src="formulaire.js"></script>
	<link rel="stylesheet" type="text/css" href="formulaire.css">
</head>
<body>
	<div class="block"><h1>INSCRIPTION</h1>
		<form method="POST" action="CreatePHP.php">
			<p>Identifiant</p>
			<input type="text" id="adressem" name="identifiant" required size="55">

			<p>Mot de Passe</p>
			<input type="password" id="mdp" name="mdp" required size="48">

            
            <select id=browsers name="droit">
                <option> 0
                <option> 1
            </select>

			<input class="envoyer"type="submit" id="boutonConnect" value="Se Connecter"></input>

		</form>

	</div>

<div class="erreur"><p><?php 
if(isset($_SESSION['error_connexion'])){
echo($_SESSION['error_connexion']);}?></p></div>
<?php unset($_SESSION['error_connexion']); ?>
</body>
</html>