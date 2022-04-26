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
    <link rel="icon" href="../logo.ico" />
    <title>Liste des écoles</title>
</head>
<header>
    <img class="logoH" src="images/OPENéduc_logo.png">
    <div class="menu">
        <a class='lienHeader' href="ListeEcole.php">Ecoles</a>
        <a class='lienHeader' href="APropos.php">A Propos</a>
    </div>
</header>
<body>

    <p class='listeEcoleListe'>Liste des école : </p>
    <div class='globalListe'>
<?php
if(isset($_SESSION['droit'])){
    echo "<input type='button' value='Déconnexion' class='bouttonAdd bouttonDeco' onclick=window.location.href='Deconnexion.php'></input>";
if($_SESSION['droit']==2 || $_SESSION['droit']==3){
    echo "<input type='button' value='Ajouter une école' class='bouttonAdd' onclick=window.location.href='Create_ecoleHTML.php'></input>";
}
if($_SESSION['droit']==3){
    echo "<input type='button' value='Ajouter un utilisateur' class='bouttonAdd bouttonAddUser' onclick=window.location.href='CreateHTML.php'></input>";
}
}
else{
    echo "<input type='button' value='Connexion' class='bouttonAdd bouttonConn' onclick=window.location.href='ConnexionHTML.php'></input>";
}

$sql = "SELECT * FROM ecole";
$sql2="SELECT * FROM adresse WHERE id=?";
$res = $conn->prepare($sql);
$res2=$conn->prepare($sql2);
$res->execute();

while($row=$res->fetch()){
    
    $res2->execute([$row['idAdresse']]);
    $adresse=$res2->fetch();
    echo ("<div class='listeEcole' onclick=window.location.href='Ecole.php?id=".$row['id']."'><p class='listeCommune'><span class='listeCommuneLib'>Commune : </span>".$adresse['commune']."</p><br><p class='listeNomEcole'><span class='listeNomEcoleLib'>Ecole : </span>".$row['nom']."</p></div>");
    
}


?>
</div>

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