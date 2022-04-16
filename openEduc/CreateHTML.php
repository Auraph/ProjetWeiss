<?php
session_start();
//if(isset($_SESSION['cookie']) && $_SESSION['cookie']=="true"){ }?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INSCRIPTION</title>
	<script type="text/javascript" src="#"></script>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<header>
    <img class="logo" src="images/OPENéduc_logo.png">
    <div class="menu">
        <p>Ecoles</p>
        <p>A Propos</p>
    </div>
</header>
<body>
	<div class="block"><h1>Inscription</h1>
		<form method="POST" action="CreatePHP.php">
			<p>Identifiant</p>
			<input class="champs"  type="text" id="adressem" name="identifiant" required size="55">

			<p>Mot de Passe</p>
			<input class="champs"  type="password" id="mdp" name="mdp" required size="48">

            
            <select id=browsers name="droit">
                <option> 0
                <option> 1
            </select>

			<input class="button" type="submit" id="boutonConnect" value="Créer le compte"></input>

		</form>

	</div>

<div class="erreur"><p><?php 
if(isset($_SESSION['error_connexion'])){
echo($_SESSION['error_connexion']);}?></p></div>
<?php unset($_SESSION['error_connexion']); ?>
</body>
<footer>
    <div class="bande"></div>
    <div class="footer">
        <img class="logo" src="images/OPENéduc_logo.png">
        <img class="logo" src="images/AlsaNum_logo.png">
        <p>Mentions Légales<p>
    </div>
</footer>
</html>