<?php
session_start();

if($_SESSION['droit']==2 || $_SESSION['droit']==3){

    $servername="localhost";
$database="openEduc";
$username="root";
$password="";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8",$username,$password);} 

	catch (Exception $e){
	die('erreur'.$e->getMessage());
}

$sqlt="SELECT * FROM ecole WHERE id=?";
$rest=$conn->prepare($sqlt);
$rest->execute([$_SESSION['id']]);
$rest=$rest->fetch();


$sql="DELETE FROM adresse WHERE id=?";
$res=$conn->prepare($sql);
$res->execute([$rest['idAdresse']]);

$sql="DELETE FROM correspondant WHERE idEcole=?";
$res=$conn->prepare($sql);
$res->execute([$_SESSION['id']]);


$sql="DELETE FROM classe WHERE idEcole=?";
$res=$conn->prepare($sql);
$res->execute([$_SESSION['id']]);


$sql="DELETE FROM ecole WHERE id=?";
$res=$conn->prepare($sql);
$res->execute([$_SESSION['id']]);

header("location:ListeEcole.php");
}
else{
    header("location:ListeEcole.php");
}