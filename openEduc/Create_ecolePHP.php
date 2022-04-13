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


//REGEX
$caractereS = "/[^'£$%^&*()}{@:'#~?><>,;@|\-=-_+-`]/";
$num = "#[0-9]{10}#";
$cara = "#[\W]+#";

function compare($regex, $val, $errormsg){
    if(preg_match($regex, $val)){
        echo "ok ";
    }else{
        $_SESSION["error"]=$errormsg;
        header("location:Create_ecoleHTML.php");
    }
}


$numRue = htmlspecialchars($_POST['numRue']);
$rue = htmlspecialchars($_POST['rue']);
$com = htmlspecialchars($_POST['com']);
$cp = htmlspecialchars($_POST['cp']);

compare($num, $numRue, "Numéro de rue ne dois être composé que de chiffre");
compare($caractereS, $rue, "Rue ne dois pas avoir de caractères spéciaux");
compare($caractereS, $com, "Commune ne dois pas avoir de caratères spéciaux");
compare($caractereS, $cp, "Code Postal ne dois pas avoir de caratères spéciaux");


$sql1 = "INSERT INTO adresse(numero, rue, commune, cp) VALUES (?,?,?,?)";
$res = $conn->prepare($sql1);
$exec = $res->execute(array($numRue, $rue, $com, $cp));



$nomEcole = htmlspecialchars($_POST['nomEcole']);
$typeEcole = htmlspecialchars($_POST['typeEcole']);
$identifiantEcole = htmlspecialchars($_POST['identifiantEcole']);
$annsco = htmlspecialchars($_POST['annsco']);
$mailE = htmlspecialchars($_POST['mailE']);
$phoneEcole = htmlspecialchars($_POST['phoneEcole']);
$datemaj = date('d-m-Y');
$idAdresse = $conn->lastInsertId();

compare($caractereS, $nomEcole);
compare($caractereS, $identifiantEcole);
compare($num, $annsco);
compare($num, $phoneEcole);

$sql2 = "INSERT INTO ecole(nom, identifiant, idAdresse, telephone, mail, typeEcole, dateMiseAJour, anneeScolaire) VALUES (?,?,?,?,?,?,?,?)";
$res = $conn->prepare($sql2);
$exec = $res->execute(array($nomEcole, $identifiantEcole, $idAdresse, $phoneEcole, $mailE, $typeEcole, $datemaj, $annsco));




$sql3 = "INSERT INTO classe(idEcole, effectifs, nom, niveau) VALUES (?,?,?,?)";
$res = $conn->prepare($sql3);

$id =0;
$idEcole = $conn->lastInsertId();

while(isset ($_POST["niveau".$id])){
    $niveau = htmlspecialchars($_POST["niveau".$id]);
    $eff = htmlspecialchars($_POST["effectifs".$id]);
    $nom = htmlspecialchars($_POST["nomClasse".$id]);
    $exec = $res->execute(array($idEcole, $eff, $nom, $niveau));
    $id += 1;
}

compare($caractereS, $niveau);
compare($num, $eff);
compare($caractereS, $nom);


$genreApea = htmlspecialchars($_POST['genreApea']);
$nomApea = htmlspecialchars($_POST['nomApea']);
$prenomApea = htmlspecialchars($_POST['prenomApea']);
$mailApea = htmlspecialchars($_POST['mailApea']);
$fonctionApea = htmlspecialchars($_POST['fonctionApea']);
$phoneApea = htmlspecialchars($_POST['phoneApea']);

compare($caractereS, $nomApea);
compare($caractereS, $prenomApea);
compare($caractereS, $fonctionApea);
compare($num, $phoneApea);

$sql4 = "INSERT INTO correspondant(idEcole, nom, prenom, entite, mail, telephone, fonction, genre) VALUES (?,?,?,?,?,?,?,?)";
$res = $conn->prepare($sql4);
$exec = $res->execute(array($idEcole, $nomApea, $prenomApea, "APEA", $mailApea, $phoneApea, $fonctionApea, $genreApea));




$genreM = htmlspecialchars($_POST['genreM']);
$nomM = htmlspecialchars($_POST['nomM']);
$prenomM = htmlspecialchars($_POST['prenomM']);
$mailM = htmlspecialchars($_POST['mailM']);
$phoneM = htmlspecialchars($_POST['phoneM']);

compare($caractereS, $nomM);
compare($caractereS, $prenomM);
compare($num, $phoneM);



$sql5 = "INSERT INTO correspondant(idEcole, nom, prenom, entite, mail, telephone, fonction, genre) VALUES (?,?,?,?,?,?,?,?)";
$res = $conn->prepare($sql5);
$exec = $res->execute(array($idEcole, $nomM, $prenomM, "Mairie", $mailM, $phoneM, "Maire", $genreM));