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
    <img class="logo" src="images/OPENéduc_logo.png">
    <div class="menu">
        <a class='lienHeaderE' href="ListeEcole.php">Ecoles</a>
        <a class='lienHeaderA' href="APropos.php">A Propos</a>
    </div>
</header>
<body>
<script type="text/javascript">
                var idnbr = 1;
                
                function addClasse() {
                    let oldid=idnbr-1;
                    let id = idnbr;
                    let p = document.getElementById('addp');
                    let newCl = document.createElement("p");
                    let htmlContent = "<p>Niveau :</p> <input type='text' class='champs niveau' name='niveau" + id + "'> <p>Nom de la classe :</p> <input type='text' class='champs nomClasse' name='nomClasse" + id + "'><p>Effectifs :</p><input type='text' class=' champs eff' name='effectifs" + id + "'>"
                    p.insertAdjacentHTML('beforeend', htmlContent);
                    idnbr += 1;
                }
            </script>
        
		<form method="POST" action="Create_ecolePHP.php">
            <h1>Ajouter un projet</h1>
			<p>Nom de l'école :</p>
			<input class="champs" type="text" id="nomEcole" name="nomEcole" required>

            




			<p>Identifiant de l'école :</p>
			<input class="champs"  type="text" id="identifiantEcole" name="identifiantEcole" required>

            <p>Numéro de rue :</p>
			<input class="champs"  type="text" id="numRue" name="numRue" required>

            <p>Rue :</p>
			<input class="champs"  type="text" id="rue" name="rue" required>

            <p>Code Postal :</p>
			<input class="champs"  type="text" id="cp" name="cp" required>

            <p>Commune :</p>
			<input class="champs"  type="text" id="com" name="com" required>

            <p>Année scolaire :</p>
			<input class="champs"  type="text" id="annsco" name="annsco" required>

            <p>E-mail de l'école :</p>
			<input class="champs"  type="text" id="mailE" name="mailE" required>

            <p>Téléphone :</p>
			<input class="champs"  type="text" id="phoneEcole" name="phoneEcole">

            <h1>Correspondant local APEA</h1>

            <select id="genreApea" name="genreApea">
                <option value="M"> M.
                <option value="Mme" > Mme.
            </select>

            <p>Nom :</p>
			<input class="champs"  type="text" id="nomApea" name="nomApea">

            <p>Prénom :</p>
			<input class="champs"  type="text" id="prenomApea" name="prenomApea">

            <p>E-mail :</p>
			<input class="champs"  type="text" id="mailApea" name="mailApea">

            <p>Téléphone :</p>
			<input class="champs"  type="text" id="phoneApea" name="phoneApea">

            <p>Fonction :</p>
			<input class="champs"  type="text" id="fonctionApea" name="fonctionApea">


            <h1>Correspondant local mairie</h1>

            <select id="genreM" name="genreM">
                <option value="M"> M.
                <option value="Mme" > Mme.
            </select>

            <p>Nom :</p>
			<input class="champs"  type="text" id="nomM" name="nomM">

            <p>Prénom :</p>
			<input class="champs"  type="text" id="prenomM" name="prenomM">

            <p>E-mail :</p>
			<input class="champs"  type="text" id="mailM" name="mailM">

            <p>Téléphone :</p>
			<input class="champs"  type="text" id="phoneM" name="phoneM">

            <h1>Classes</h1>

            <p>Niveau :</p>
			<input class="niveau champs"  type="text" name="niveau0" required>

            <p>Nom de la classe :</p>
			<input class="nomClasse champs"  type="text" name="nomClasse0" required>

            <p>Effectifs :</p>
			<input class="eff champs"  type="text" name="effectifs0" required>

           
<p id="addp"></p>
            <input class="button" type="button" onclick="addClasse()" id="ajouter" value="Ajouter une classe"></br>


			<input class="button" type="submit" id="boutonAddEcole" value="Ajouter Ecole"></input>

		</form>


<div class="erreur"><p><?php 
if(isset($_SESSION['error_connexion'])){
echo($_SESSION['error_connexion']);}?></p></div>
<?php unset($_SESSION['error_connexion']); ?>
</body>

<footer class='footerCE'>
    <div class="bande"></div>
    <div class="footer">
        <img class="logo" src="images/OPENéduc_logo.png">
        <img class="logo" src="images/AlsaNum_logo.png">
        <p>Mentions Légales<p>
    </div>
</footer>
</html>