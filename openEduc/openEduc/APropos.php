<?php
session_start();
//if(isset($_SESSION['cookie']) && $_SESSION['cookie']=="true"){ }?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css.css">
	<title>Ajouter un projet</title>
</head>
<header>
    <img class="logoH" src="images/OPENéduc_logo.png">
    <div class="menu">
        <a class='lienHeader' href="ListeEcole.php">Ecoles</a>
        <a class='lienHeader' href="APropos.php">A Propos</a>
    </div>
</header>
<body>
    <h1>A Propos...</h1>
    <h2>APEA</h2>
    <p>L’APEA, Association de Parents d’Elèves d’Alsace, est une organisation à but non lucratif qui a pour mission de
participer aux actions scolaires au sein des établissements publics locaux d’enseignement.
Elle participe au fonctionnement du service public de l'éducation en tant qu’intermédiaire entre les parents et le
personnel pédagogique. Elle a pour objet la défense des intérêts moraux et matériels communs aux parents d'élèves.
Elle est, de ce fait, représentée au conseil d’école, au conseil d'administration des EPLE, au Conseil supérieur de
l'éducation, dans les conseils académiques et dans les conseils départementaux de l'Éducation nationale.
Votre interlocuteur principal tout au long de votre mission sera Laurent Hatt, secrétaire général de l’association. Il est
impliqué tout particulièrement dans le domaine de l’éducation au niveau primaire, donc essentiellement les projets en
rapport avec les écoles.</p>

    <h2>RGPD</h2>
    <p>Ce site ne demande aucune information personnelle ou sensible. Aucun cookies n'est donc present.</p>

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