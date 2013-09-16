<!--RAMADANI Arbër 10/06/2012-->
<?php
include('../Requetes/connexion.php');//ouverture de la connexion

//Récupération des variables

$txtNom = $_POST['txtNom'];
$txtRepEnt = $_POST['txtRepEnt'];
$txtQR = preg_replace('/\'/', '\'\'', $_POST['txtQR']);
$txtAd = $_POST['txtAd'];
$txtCP = $_POST['txtCP'];
$txtVille = $_POST['txtVille'];
$txtTel = $_POST['txtTel'];
$txtActE = preg_replace('/\'/', '\'\'', $_POST['txtActE']);

//requête d'insertion d'entreprise dans la base de données 

$req="INSERT INTO entreprise(NOMENT, REPENT, QUALITEREP, ADRUEENT, CPENT, VILLEENT, TELENT, ACTENT)
 VALUES('$txtNom', '$txtRepEnt', '$txtQR', '$txtAd', '$txtCP', '$txtVille', '$txtTel', '$txtActE')";
echo $req;

$connexion->exec($req);//execution de la requête

HEADER('Location: ../SuiviDeStages/RechercheEntreprise.php');//redirection de la page

?>