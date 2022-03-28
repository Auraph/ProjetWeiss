<?php
session_start();
$servername="localhost";
$database="openEduc";
$username="root";
$password="";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8",$username,$password);} 

	catch (Exception $e){
	die('erreur'.$e->getMessage());
}


$identifiant = $_POST['identifiant'];
$mdp = md5($_POST["mdp"]);
$sql = "SELECT COUNT(*) AS 'test'FROM utilisateur WHERE identifiant = :identifiant AND mdp = :mdp";
$res = $conn->prepare($sql);
$exec = $res->execute(array("identifiant"=>$identifiant, "mdp"=>$mdp));
$resultat = $res->fetch();

if ($resultat['test'] == 1){
	header("location:test.php");
}
else{
	$_SESSION["error_connexion"]="Identifiant ou Mot de passe incorrect";
	header("location:ConnexionHTML.php");
}