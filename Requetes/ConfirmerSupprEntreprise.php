<!--RAMADANI Arbër 18/06/2012-->
<?php 
include('../Requetes/connexion.php');//ouverture de la connexion

//recupération des variables 
$txtNoENT = $_POST['txtNoENT'];


//requête de modification

$req = "Delete from entreprise where NOENT='$txtNoENT'"; // requête pour supprimer une entreprise
$connexion->exec($req);//execution de la requête
header('Location:../SuiviDeStages/RechercheEntreprise.php');//redirection de la page
?>