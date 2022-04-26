<?php
session_start();

if(isset($_SESSION['droit'])){
if($_GET['id']==$_SESSION['idEcoleUser'] || $_SESSION['droit']==2 || $_SESSION['droit']==3){
    $servername="localhost";
    $database="openEduc";
    $username="root";
    $password="";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8",$username,$password);} 
    
        catch (Exception $e){
        die('erreur'.$e->getMessage());
    }
    $sql="SELECT * FROM ecole WHERE id=?";
    $res=$conn->prepare($sql);
    $res->execute([$_GET['id']]);
    $res=$res->fetch();
    $sql2="SELECT * FROM adresse WHERE id=?";
    $res2=$conn->prepare($sql2);
    $res2->execute([$res['idAdresse']]);
    $res2=$res2->fetch();
    $sql3="SELECT * from correspondant WHERE idEcole=?";
    $res3=$conn->prepare($sql3);
    $res3->execute([$res['id']]);
    $res3Fetch=$res3->fetch();
    $sql4 = "SELECT * FROM classe WHERE idEcole=?";
    $res4 = $conn->prepare($sql4);
    $res4->execute([$_GET['id']]);
    $nbrClasse=0;
    $_SESSION['id']=$_GET['id'];
    while($rowCl=$res4->fetch()){
        $nbrClasse=$nbrClasse+1;}
       
?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css.css">
    <link rel="icon" href="../logo.ico" />
	<title>Modifier une école</title>
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
if($_SESSION['droit']==2 || $_SESSION['droit']==3){
    echo "<input type='button' value=\"Supprimer l'école\" class='bouttonAdd bouttonConn' onclick=window.location.href='Delete.php'></input>";
}

?>

<script type="text/javascript">
                var idnbr = <?php echo $nbrClasse;?>;
                
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
        
		<form method="POST" action="Modif_ecolePHP.php">
            <h1>Modifier l'école</h1>


			<p>Nom de l'école :</p>
			<input class="champs" type="text" id="nomEcole" name="nomEcole" required value="<?php echo $res['nom'];?>">

			<p>Identifiant de l'école :</p>
			<input class="champs"  type="text" id="identifiantEcole" name="identifiantEcole" required value="<?php echo $res['identifiant'];?>">

            <p>Numéro de rue :</p>
			<input class="champs"  type="text" id="numRue" name="numRue" required value="<?php echo $res2['numero'];?>">

            <p>Rue :</p>
			<input class="champs"  type="text" id="rue" name="rue" required value="<?php echo $res2['rue'];?>">

            <p>Code Postal :</p>
			<input class="champs"  type="text" id="cp" name="cp" required value="<?php echo $res2['cp'];?>">

            <p>Commune :</p>
			<input class="champs"  type="text" id="com" name="com" required value="<?php echo $res2['commune'];?>">

            <p>Année scolaire :</p>
			<input class="champs"  type="text" id="annsco" name="annsco" required value="<?php echo $res['anneeScolaire'];?>">

            <p>E-mail de l'école :</p>
			<input class="champs"  type="text" id="mailE" name="mailE" required value="<?php echo $res['mail'];?>">

            <p>Téléphone :</p>
			<input class="champs"  type="text" id="phoneEcole" name="phoneEcole" value="<?php echo $res['telephone'];?>">

            <h1>Correspondant local APEA</h1>

            <select id="genreApea" name="genreApea" >
                <option value=<?php echo $res3Fetch['genre'];?>>
                <option value="M"> M.
                <option value="Mme" > Mme.
            </select>

            <p>Nom :</p>
			<input class="champs"  type="text" id="nomApea" name="nomApea" value="<?php echo $res3Fetch['nom'];?>">

            <p>Prénom :</p>
			<input class="champs"  type="text" id="prenomApea" name="prenomApea" value="<?php echo $res3Fetch['prenom'];?>">

            <p>E-mail :</p>
			<input class="champs"  type="text" id="mailApea" name="mailApea" value="<?php echo $res3Fetch['mail'];?>">

            <p>Téléphone :</p>
			<input class="champs"  type="text" id="phoneApea" name="phoneApea" value="<?php echo $res3Fetch['telephone'];?>">

            <p>Fonction :</p>
			<input class="champs"  type="text" id="fonctionApea" name="fonctionApea" value="<?php echo $res3Fetch['fonction'];?>">

<?php $res3Fetch=$res3->fetch(); ?>
            <h1>Correspondant local mairie</h1>

            <select id="genreM" name="genreM">
            <option value=<?php echo $res3Fetch['genre'];?>>
                <option value="M"> M.
                <option value="Mme" > Mme.
            </select>

            <p>Nom :</p>
			<input class="champs"  type="text" id="nomM" name="nomM" value="<?php echo $res3Fetch['nom'];?>">

            <p>Prénom :</p>
			<input class="champs"  type="text" id="prenomM" name="prenomM" value="<?php echo $res3Fetch['prenom'];?>">

            <p>E-mail :</p>
			<input class="champs"  type="text" id="mailM" name="mailM" value="<?php echo $res3Fetch['mail'];?>">

            <p>Téléphone :</p>
			<input class="champs"  type="text" id="phoneM" name="phoneM" value="<?php echo $res3Fetch['telephone'];?>">

            <h1>Classes</h1>
            <?php
            $nbrClasseNew=0;
            $res4->execute([$_GET['id']]);
            while($rowCl=$res4->fetch()){
        echo ("
            <p>Niveau :</p>
			<input class='niveau champs'  type='text' name='niveau".$nbrClasseNew."' value='".$rowCl['niveau']."'>

            <p>Nom de la classe :</p>
			<input class='nomClasse champs'  type='text' name='nomClasse".$nbrClasseNew."'  value='".$rowCl['nom']."'>

            <p>Effectifs :</p>
			<input class='eff champs'  type='text' name='effectifs".$nbrClasseNew."'  value='".$rowCl['effectifs']."'>
");
$nbrClasseNew++;}
           ?>
<p id="addp"></p>
            <input class="button" type="button" onclick="addClasse()" id="ajouter" value="Ajouter une classe"></br>


			<input class="button" type="submit" id="boutonAddEcole" value="Modifier l'école"></input>

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
        <a class='lienHeader' href="APropos.php">Mentions Légales</a>
    </div>
</footer>
</html>
<?php
}else{
    header("location:ConnexionHTML.php");
}
}else{
    header("location:ConnexionHTML.php");}
?>