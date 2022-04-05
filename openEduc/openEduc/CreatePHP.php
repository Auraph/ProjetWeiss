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
$sql = "INSERT INTO utilisateur(identifiant,mdp,droit) VALUES (?,?,?)";
$res = $conn->prepare($sql);
$exec = $res->execute(array($identifiant,$mdp,$droit));