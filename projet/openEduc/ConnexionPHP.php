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
$sql2="SELECT * FROM utilisateur WHERE identifiant=:identifiant AND mdp = :mdp";
$res = $conn->prepare($sql);
$res2 = $conn->prepare($sql2);
$exec = $res->execute(array("identifiant"=>$identifiant, "mdp"=>$mdp));
$resultat = $res->fetch();

if ($resultat['test'] == 1){
	$res2->execute(array("identifiant"=>$identifiant,"mdp"=>$mdp));
	$res2=$res2->fetch();
	$_SESSION['droit']=$res2['droit'];
	$_SESSION['idEcoleUser']=$res2['idEcole'];
	header("location:ListeEcole.php");
}
else{
	$_SESSION["error_connexion"]="Identifiant ou Mot de passe incorrect";
	header("location:ConnexionHTML.php");
}