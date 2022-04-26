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
$droit=$_POST['droit'];

$sqlTest="SELECT COUNT(*) AS exist FROM utilisateur WHERE identifiant=?";
$res=$conn->prepare($sqlTest);
$res->execute([$identifiant]);
$res=$res->fetch();
if($res['exist']==0){
$sql = "INSERT INTO utilisateur(identifiant,mdp,droit) VALUES (?,?,?)";
$res = $conn->prepare($sql);
$exec = $res->execute(array($identifiant,$mdp,$droit));
header('location:ConnexionHTML.php');
}
else{
		$_SESSION['error_connexion']="Identifiant déjà utilisé";
	header("location:CreateHTML.php");
}
