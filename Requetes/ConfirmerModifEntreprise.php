<!--RAMADANI Arbër 18/06/2012-->
<?php 
include('../Requetes/connexion.php');//ouverture de la connexion

//recupération des variables 
$txtNoEnt = $_POST['txtNoEnt'];
$txtNomE = $_POST['txtNom'];
$txtRpz = $_POST['txtRepEnt'];
$txtQr = $_POST['txtQR'];
$txtAdE = $_POST['txtAd'];
$txtCpE = $_POST['txtCP'];
$txtVilleE = $_POST['txtVille'];
$txtTelE = $_POST['txtTel'];
$txtActE = $_POST['txtActE'];

//requête de modification

$req = "Update entreprise SET NOMENT='$txtNomE', REPENT='$txtRpz', QUALITEREP='$txtQr', ADRUEENT='$txtAdE', 
	CPENT='$txtCpE', VILLEENT='$txtVilleE', TELENT='$txtTelE', ACTENT='$txtActE'
	where NOENT = $txtNoEnt";
$sql = $connexion->exec($req);	
	HEADER('Location:../SuiviDeStages/RechercheEntreprise.php');
	
?>