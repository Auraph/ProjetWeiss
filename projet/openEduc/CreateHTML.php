<?php
session_start();
if(isset($_SESSION['droit']) && $_SESSION['droit']==3){
    
$servername="localhost";
$database="openEduc";
$username="root";
$password="";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8",$username,$password);} 

	catch (Exception $e){
	die('erreur'.$e->getMessage());
}
$sql = "SELECT * FROM ecole";
$res = $conn->prepare($sql);
$res->execute();
?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Création de compte</title>
    <link rel="icon" href="../logo.ico" />
	<script type="text/javascript" src="#"></script>
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
	<div class="block"><h1>Inscription</h1>
		<form method="POST" action="CreatePHP.php">
			<p>Identifiant</p>
			<input class="champs"  type="text" id="adressem" name="identifiant" required size="55">

			<p>Mot de Passe</p>
			<input class="champs"  type="password" id="mdp" name="mdp" required size="48">

            
            <select id=browsers name="droit">
                <option value=1> Modification de son école
                <option value=2> Modification de toutes les écoles et ajout
                <option value=3> Administrateur
            </select>
            <select name="ecoleUser">
            <?php 
            while($row=$res->fetch()){
                echo "<option value=".$row['id'].">".$row['nom'];
            }
  

    ?>
         
            </select>
			<input class="button" type="submit" id="boutonConnect" value="Créer le compte"></input>

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
<?php }
else{
    header("location:ConnexionHTML.php");
}