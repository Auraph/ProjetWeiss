<?php
if(isset($_GET['id'])){
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
    <link rel="icon" href="../logo.ico" />
    <title>Ecole</title>
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




if(isset($_SESSION['droit'])){
if($_GET['id']==$_SESSION['idEcoleUser'] || $_SESSION['droit']==2 || $_SESSION['droit']==3){
    echo "<input type='button' value=\"Modifier l'école\" class='bouttonAdd' onclick=window.location.href='Modif_ecoleHTML.php?id=".$_GET['id']."'></input>";
}}else{
    echo "<input type='button' value='Connexion' class='bouttonAdd bouttonConn' onclick=window.location.href='ConnexionHTML.php'></input>";
}
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
        <p class='ecoleIdentifiant'><span class='info'>Identifiant : </span>".$row['identifiant']."</p>
        <p class='ecoleAdresse'><span class='info'>Adresse : </span>".$adresse['numero']." ".$adresse['rue']." ".$adresse['cp'].", ".$adresse['commune']."</p>
        <p class='ecoleTel'><span class='info'>Téléphone : </span>".wordwrap($row['telephone'],2," ",1)."</p>
        <p class='ecoleEmail'><span class='info'>Email : </span>".$row['mail']."</p>
        <p class='ecoleAnnee'><span class='info'>Année scolaire : </span>".$row['anneeScolaire']."</p>
        <p class='ecoleDate'><span class='info'>Date de mise à jour : </span>".$row['dateMiseAJour']."</p>
    </div>");

while($rowC=$res3->fetch()){
    if($rowC['nom']!=""){
        if($rowC['telephone']!=""){
            $telCo="<p class='ecoleTel'><span class='info'>Téléphone : </span>".wordwrap($rowC['telephone'],2," ",1)."</p>";
        }else{
            $telCo="";
        }
    echo ("
    <div class='divCo'>
        <p class='co'><span class='info'>Correspondant local ".$rowC['entite']." : </span>".$rowC['genre'].". ".$rowC['nom']." ".$rowC['prenom']."</p>".$telCo."
        <p class='coMail'><span class='info'>Email : </span>".$rowC['mail']."</p></div>
        
        ");}
}
    
echo ("  
<table class='ecoleTableGen'>
    <thead class='ecoleTable'>
        <tr class='tableHead'>
            <th>Niveau(x)</th>
            <th>Nom de la classe</th>
            <th>Effectifs</th>
        </tr>
    </thead><tbody>");

while($rowCl=$res4->fetch()){
    echo ("
        <tr class='listeTable'>
            <td class='classeTableCol1'>".$rowCl['niveau']."</td>
            <td class='classeTableCol2'>".$rowCl['nom']."</td>
            <td class='classeTableCol3'>".$rowCl['effectifs']."</td>
        </tr>
    
");
$total=$total+$rowCl['effectifs'];
$nbrClasse++;
}
    
echo ("
<tr>
    <td class='classeTableTotal'></td>
    <td class='totalEff'>Total effectif école</td>
    <td class='totalEffCal'>".$total."</td>
</tr>
<tr>
    <td class='classeTableMoy'></td>
    <td class='moyenneEff'>Moyenne par classe</td>
    <td class='moyenneEffCal'>".round($total/$nbrClasse,1)."</td>
</tr>


</tbody>
</table>
</div>

");


?>


    
</body>
<footer class='footerCE'>
    <div class="bande"></div>
    <div class="footer">
        <img class="logo" src="images/OPENéduc_logo.png">
        <img class="logo" src="images/AlsaNum_logo.png">
        <a class='lienHeader' href="APropos.php">Mentions Légales</a>
    </div>
</footer>
</html>
<?php 
}else{
    header("location:ListeEcole.php");
}