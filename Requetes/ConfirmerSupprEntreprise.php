<!--RAMADANI Arb�r 18/06/2012-->
<?php 
include('../Requetes/connexion.php');//ouverture de la connexion

//recup�ration des variables 
$txtNoENT = $_POST['txtNoENT'];


//requ�te de modification

$req = "Delete from entreprise where NOENT='$txtNoENT'"; // requ�te pour supprimer une entreprise
$connexion->exec($req);//execution de la requ�te
header('Location:../SuiviDeStages/RechercheEntreprise.php');//redirection de la page
?>