<?php
	session_start();
	
	//Appel de la page de connexion � la base de donn�es MySql
	include ("../Requetes/Connexion.php");
	
	//R�cup�ration des variables de la page InsererContact.php
	$ModeContact = $_POST['txtNom'];
	
	//Requ�tes sql
	$req = "INSERT INTO modecontact (LIBELLEMODE) VALUES ('$ModeContact')";

	//Ex�cution de la requ�te
	$sql = $connexion->query($req);
	$sqlf = $sql->fetch();
	
	if (!$sqlf = FALSE){
		header("location:../RechercheDeStages/RechercheStages.php");
	}else{
		echo"Erreur ! Veuillez R�essayer.";
	}
?>