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
function accents($varMaChaine)
		{
			$search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
			
			$replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');

			$varMaChaine = str_replace($search, $replace, $varMaChaine);
			return $varMaChaine;
		}

//REGEX

$numTel = "#[0-9]{8-12}#";
$cara = "#[\W]+#";
$caraT = "#[^a-zA-Z0-9_-]+#";
$nombre = "#[\D]+#";
$errorG = "Terme invalide";


function mailC($val,$errormsg){
    if($val!=""){
    if (filter_var($val,FILTER_VALIDATE_EMAIL)) {
        echo "Your email is ok.<br>";
    } else {
        $_SESSION["error"]=$errormsg;
        header("location:Create_EcoleHTML.php");
        exit();
    } 
}
}
function compare($regex, $val, $errormsg){
    if($val!=""){
    $val= accents($val);
    $replace = array("/","[","]","^","'","£","$","%","*","}","{","~","|","\\");
    $val=str_replace($replace,"",$val);
    $val=str_replace(" ","",$val);
    if(preg_match($regex, $val)){
       $_SESSION["error"]=$errormsg;
       header("location:Create_EcoleHTML.php");
        exit();
    }else{
         echo "ok ".$val."<br>";
        
    }
}
}

$datemaj = date('d-m-Y');

$nomEcole = $_POST['nomEcole'];
compare($cara, $nomEcole,$errorG);




$identifiantEcole = $_POST['identifiantEcole'];
compare($cara, $identifiantEcole,$errorG);

$numRue = $_POST['numRue'];
compare($nombre, $numRue, "Numéro de rue : Chiffres uniquement");

$rue = $_POST['rue'];
compare($caraT, $rue, "Rue : Caractères alphanumériques uniquement");

$cp = $_POST['cp'];
compare($cara,$cp, "Code Postal : Terme invalide");

$com = $_POST['com'];
compare($caraT, $com, "Commune : Terme invalide");

$annsco = $_POST['annsco'];
compare($nombre, $annsco, "Année scolaire : Chiffres uniquement");

$mailE = $_POST['mailE'];
mailC($mailE,"E-mail de l'école : Mauvais format");


$phoneEcole = $_POST['phoneEcole'];
compare($numTel, $phoneEcole, "Téléphone de l'école : 10 Chiffres uniquement");


$genreApea = $_POST['genreApea'];
compare($cara,$genreApea,"Genre Apea : Erreur");

$nomApea = $_POST['nomApea'];
compare($cara, $nomApea, "Nom APEA : Terme invalide");

$prenomApea = $_POST['prenomApea'];
compare($cara, $prenomApea,"Prenom APEA : Terme invalide");

$mailApea = $_POST['mailApea'];
mailC($mailApea,"E-mail de l'APEA : Mauvais format");

$phoneApea = $_POST['phoneApea'];
compare($numTel, $phoneApea, "Téléphone APEA : 10 Chiffres uniquement");

$fonctionApea = $_POST['fonctionApea'];
compare($cara, $fonctionApea, "Fonction APEA : Terme invalide");



$genreM = $_POST['genreM'];
compare($cara,$genreM,"Genre Maire : Erreur");

$nomM = $_POST['nomM'];
compare($cara, $nomM, "Nom Maire : Terme invalide");

$prenomM = $_POST['prenomM'];
compare($cara, $prenomM, "Prenom Maire : Terme invalide");

$mailM = $_POST['mailM'];
mailC($mailM,"E-mail Maire : Mauvais format");

$phoneM = $_POST['phoneM'];
compare($numTel, $phoneM,"Téléphone Maire : 10 Chiffres uniquement");

$fonctionMaire = $_POST['fonctionMaire'];
compare($cara, $fonctionMaire, "Fonction Maire : Terme invalide");



$sql1 = "INSERT INTO adresse(numero, rue, commune, cp) VALUES (?,?,?,?)";
$res = $conn->prepare($sql1);
$exec = $res->execute(array($numRue, $rue, $com, $cp));

echo $idAdresse = $conn->lastInsertId();


$sql2 = "INSERT INTO ecole(nom, identifiant, idAdresse, telephone, mail, dateMiseAJour, anneeScolaire) VALUES (?,?,?,?,?,?,?)";
$res = $conn->prepare($sql2);
$exec = $res->execute(array($nomEcole, $identifiantEcole, $idAdresse, $phoneEcole, $mailE, $datemaj, $annsco));


$sql3 = "INSERT INTO classe(idEcole, effectifs, nom, niveau) VALUES (?,?,?,?)";
$res = $conn->prepare($sql3);

$id =0;
$idEcole = $conn->lastInsertId();

while(isset ($_POST["niveau".$id])){
    if($_POST["niveau".$id]!=""){
    $niveau = $_POST["niveau".$id];
    $eff = $_POST["effectifs".$id];
    $nom = $_POST["nomClasse".$id];
    compare($cara, $niveau,"Niveau : Terme invalide");
    compare($cara, $nom, "Nom de la classe : Terme invalide");
    compare($nombre, $eff,"Effectifs : Chiffres uniquement");
   
    $exec = $res->execute(array($idEcole, $eff, $nom, $niveau));
    }
    $id += 1;
}




$sql4 = "INSERT INTO correspondant(idEcole, nom, prenom, entite, mail, telephone, fonction, genre) VALUES (?,?,?,?,?,?,?,?)";
$res = $conn->prepare($sql4);
$exec = $res->execute(array($idEcole, $nomApea, $prenomApea, "APEA", $mailApea, $phoneApea, $fonctionApea, $genreApea));





$sql5 = "INSERT INTO correspondant(idEcole, nom, prenom, entite, mail, telephone, fonction, genre) VALUES (?,?,?,?,?,?,?,?)";
$res = $conn->prepare($sql5);
$exec = $res->execute(array($idEcole, $nomM, $prenomM, "Mairie", $mailM, $phoneM, $fonctionMaire, $genreM));

header("location:ListeEcole.php");