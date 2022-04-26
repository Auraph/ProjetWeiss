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
    <img class="logo" src="images/OPENéduc_logo.png">
    <div class="menu">
        <a class='lienHeaderE' href="ListeEcole.php">Ecoles</a>
        <a class='lienHeaderA' href="APropos.php">A Propos</a>
    </div>
</header>
<body>
<?php

$sql = "SELECT * FROM ecole WHERE id=?";
$sql2 = "SELECT * FROM adresse WHERE id=?";
$sql3 = "SELECT * FROM correspondant WHERE idEcole=?";
$sql4 = "SELECT * FROM classe WHERE idEcole=?";
$res = $conn->prepare($sql);
$res2 = $conn->prepare($sql2);
$res3 = $conn->prepare($sql3);
$res4 = $conn->prepare($sql4);
$res->execute([$_GET['id']]);
$res3->execute([$_GET['id']]);
$res4->execute([$_GET['id']]);
$row=$res->fetch();
$res2->execute([$row['idAdresse']]);
$adresse=$res2->fetch();
$total=0;
$nbrClasse=0;
echo ("
<div class='divEcole'>
    <p class='ecoleCommune'>".$adresse['commune']."</p>
    <br>
    <p class='ecoleNom'>".$row['nom']."</p>
    <div class='coEcole'>
        <p class='ecoleIdentifiant'>".$row['identifiant']."</p>
        <p class='ecoleAdresse'>".$adresse['numero']." ".$adresse['rue']." ".$adresse['cp'].", ".$adresse['commune']."</p>
        <p class='ecoleTel'>".wordwrap($row['telephone'],2," ",1)."</p>
        <p class='ecoleEmail'>".$row['mail']."</p>
        <p class='ecoleAnnee'>".$row['anneeScolaire']."</p>
        <p class='ecoleDate'>".$row['dateMiseAJour']."</p>
    </div>");

while($rowC=$res3->fetch()){
    
    echo ("
    <div class='divCo'>
        <p class='co'>Correspondant local ".$rowC['entite']." : ".$rowC['genre'].". ".$rowC['nom'].$rowC['prenom']." ".wordwrap($rowC['telephone'],2," ",1)."</p>
        <p class='coMail'>".$rowC['mail']."</p>
        
        ");
}
    
echo ("  
<table>
    <thead class='ecoleTable'>
        <tr class='tableHead'>
            <th>Niveau(x)</th>
            <th>Nom de la classe</th>
            <th>Effectifs</th>
        </tr>
    </thead><tbody>");

while($rowCl=$res4->fetch()){
    echo ("
        <tr>
            <td class='classeTableCol1'>".$rowCl['niveau']."</td>
            <td>".$rowCl['nom']."</td>
            <td>".$rowCl['effectifs']."</td>
        </tr>
    
");
$total=$total+$rowCl['effectifs'];
$nbrClasse++;
}
    
echo ("
<tr>
    <td class='classeTableTotal'></td>
    <td>Total effectif école</td>
    <td>".$total."</td>
</tr>
<tr>
    <td class='classeTableMoy'></td>
    <td>Moyenne par classe</td>
    <td>".$total/$nbrClasse."</td>
</tr>


</tbody>
</table>
</div>

");


?>


    
</body>
<footer class='footerG'>
    <div class="bande"></div>
    <div class="footer">
        <img class="logo" src="images/OPENéduc_logo.png">
        <img class="logo" src="images/AlsaNum_logo.png">
        <p>Mentions Légales<p>
    </div>
</footer>
</html>