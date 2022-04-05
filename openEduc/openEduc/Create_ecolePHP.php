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


$nomEcole = $_POST['nomEcole'];
$typeEcole = $_POST['typeEcole'];
$identifiantEcole = $_POST['identifiantEcole'];
$numRue = $_POST['numRue'];
$rue = $_POST['rue'];
$cp = $_POST['cp'];
$com = $_POST['com'];
$annsco = $_POST['annsco'];
$mailE = $_POST['mailE'];
$genre = $_POST['genreApea'];
$nomApea = $_POST['nomApea'];
$prenomApea = $_POST['prenomApea'];
$mailApea = $_POST['mailApea'];
$fonctionApea = $_POST['fonctionApea'];
$genreM = $_POST['genreM'];
$nomM = $_POST['nomM'];
$prenomM = $_POST['prenomM'];
$mailM = $_POST['mailM'];
$phone = $_POST['phone'];
$datemaj = date('d-m-Y');



$id=0;

$sql2 = "INSERT INTO adresse(numero, rue, commune, cp) VALUES (?,?,?,?)";
$res = $conn->prepare($sql2);
$exec = $res->execute(array($numRue, $rue, $com, $cp));

$idAdresse = $conn->lastInsertId();

$sql1 = "INSERT INTO ecole(nom, identifiant, idAdresse, telephone, mail, typeEcole, dateMiseAJour, anneeScolaire) VALUES (?,?,?,?,?,?,?,?)";
$res = $conn->prepare($sql1);
$exec = $res->execute(array($nomEcole, $identifiantEcole, $idAdresse, $phone, $mailE, $typeEcole, $datemaj, $annsco));

$sql3 = "INSERT INTO classe(idEcole, effectifs, nom, niveau) VALUES (?,?,?,?)";
$res = $conn->prepare($sql3);

$idEcole = $conn->lastInsertId();

while(isset ($_POST["niveau".$id])){
    $niveau = $_POST["niveau".$id];
    $eff = $_POST["effectifs".$id];
    $nom = $_POST["nomClasse".$id];

    $exec = $res->execute(array($idEcole, $eff, $nom, $niveau));
    $id += 1;
}