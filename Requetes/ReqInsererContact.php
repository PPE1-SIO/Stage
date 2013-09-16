<?php
	session_start();
	
	//Appel de la page de connexion à la base de données MySql
	include ("../Requetes/Connexion.php");
	
	//Récupération des variables de la page InsererContact.php
	$ModeContact = $_POST['txtNom'];
	
	//Requêtes sql
	$req = "INSERT INTO modecontact (LIBELLEMODE) VALUES ('$ModeContact')";

	//Exécution de la requête
	$sql = $connexion->query($req);
	$sqlf = $sql->fetch();
	
	if (!$sqlf = FALSE){
		header("location:../RechercheDeStages/RechercheStages.php");
	}else{
		echo"Erreur ! Veuillez Réessayer.";
	}
?>