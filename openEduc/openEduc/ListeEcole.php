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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css.css">
    <title>Document</title>
</head>
<header>
    <img class="logoH" src="images/OPENéduc_logo.png">
    <div class="menu">
        <a class='lienHeader' href="ListeEcole.php">Ecoles</a>
        <a class='lienHeader' href="APropos.php">A Propos</a>
    </div>
</header>
<body>
<?php

$sql = "SELECT * FROM ecole";
$sql2="SELECT * FROM adresse WHERE id=?";
$res = $conn->prepare($sql);
$res2=$conn->prepare($sql2);
$res->execute();

while($row=$res->fetch()){
    
    $res2->execute([$row['idAdresse']]);
    $adresse=$res2->fetch();
    echo ("<div class='listeEcole' onclick=window.location.href='Ecole.php?id=".$row['id']."'><p class='listeCommune'>".$adresse['commune']."</p><br><p class='listeNomEcole'>".$row['nom']."</p></div>");
    
}


?>


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