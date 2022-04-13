<?php
session_start();
//if(isset($_SESSION['cookie']) && $_SESSION['cookie']=="true"){ }?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css.css">
	<title>Ajouter un projet</title>
	<link rel="stylesheet" type="text/css" href="#">
</head>
<body>
<script type="text/javascript">
                var idnbr = 1;
                
                function addClasse() {
                    let oldid=idnbr-1;
                    let id = idnbr;
                    let p = document.getElementById('addp');
                    let newCl = document.createElement("p");
                    let htmlContent = "<p>Niveau</p> <input type='text' class='niveau' name='niveau" + id + "'> <p>Nom de la classe</p> <input type='text' class='nomClasse' name='nomClasse" + id + "'><p>Effectifs</p><input type='text' class='eff' name='effectifs" + id + "'>"
                    p.insertAdjacentHTML('beforeend', htmlContent);
                    idnbr += 1;
                }
            </script>
	<div class="block"><h1>Ajouter un projet</h1>
		<form method="POST" action="Create_ecolePHP.php">
			<p>Nom de l'école</p>
			<input type="text" id="nomEcole" name="nomEcole" required>

            <select id="typeEcole" name="typeEcole">
                <option> Maternelle
                <option> Élémentaire
                <option> Collège
                <option> Lycée
            </select>




			<p>Identifiant de l'école</p>
			<input type="text" id="identifiantEcole" name="identifiantEcole" required>

            <p>Numéro de rue</p>
			<input type="text" id="numRue" name="numRue" required>

            <p>Rue</p>
			<input type="text" id="rue" name="rue" required>

            <p>Code Postal</p>
			<input type="text" id="cp" name="cp" required>

            <p>Commune</p>
			<input type="text" id="com" name="com" required>

            <p>Année scolaire</p>
			<input type="text" id="annsco" name="annsco" required>

            <p>E-mail de l'école</p>
			<input type="text" id="mailE" name="mailE" required>

            <p>Téléphone</p>
			<input type="text" id="phoneEcole" name="phoneEcole">

            <h1>Correspondant local APEA</h1>

            <select id="genreApea" name="genreApea">
                <option> M.
                <option> Mme.
            </select>

            <p>Nom</p>
			<input type="text" id="nomApea" name="nomApea">

            <p>Prénom</p>
			<input type="text" id="prenomApea" name="prenomApea">

            <p>E-mail</p>
			<input type="text" id="mailApea" name="mailApea">

            <p>Téléphone</p>
			<input type="text" id="phoneApea" name="phoneApea">

            <p>Fonction</p>
			<input type="text" id="fonctionApea" name="fonctionApea">


            <h1>Correspondant local mairie</h1>

            <select id="genreM" name="genreM">
                <option> M.
                <option> Mme.
            </select>

            <p>Nom</p>
			<input type="text" id="nomM" name="nomM">

            <p>Prénom</p>
			<input type="text" id="prenomM" name="prenomM">

            <p>E-mail</p>
			<input type="text" id="mailM" name="mailM">

            <p>Téléphone</p>
			<input type="text" id="phoneM" name="phoneM">

            <h1>Classes</h1>

            <p>Niveau</p>
			<input type="text" class="niveau" name="niveau0" required>

            <p>Nom de la classe</p>
			<input type="text" class="nomClasse" name="nomClasse0" required>

            <p>Effectifs</p>
			<input type="text" class="eff" name="effectifs0" required>

           
<p id="addp"></p>
            <input type="button" onclick="addClasse()" id="ajouter" value="Ajouter une classe"></br>


			<input type="submit" id="boutonAddEcole" value="Ajouter Ecole"></input>

		</form>

	</div>

<div class="erreur"><p><?php 
if(isset($_SESSION['error_connexion'])){
echo($_SESSION['error_connexion']);}?></p></div>
<?php unset($_SESSION['error_connexion']); ?>
</body>
</html>