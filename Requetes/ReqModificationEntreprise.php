<?php
	//Fait par Thomas David Tous droits r�serv�s
	session_start();

	// Fichier php de Connexion � la base de donn�es mysql 
	include ("../Requetes/Connexion.php");

	// R�cup�ration des donn�es saisies dans le formulaire de la demande de stage
	$donnees = $_SESSION['NoEntr'];
	$NomEntreprise = $_POST['txtNom'];
	$RepresentantE = $_POST['txtRepEnt'];
	$QualiteRepresentantE = $_POST['txtQR'];
	$AdresseE = $_POST['txtAd'];
	$CodePostalE = $_POST['txtCP'];
	$VilleE = $_POST['txtVille'];
	$TelephoneE = $_POST['txtTel'];
	$actE = $_POST['txtActE'];
			
	// lancement de la requete
	$sql = "UPDATE entreprise SET 
	NOMENT='$NomEntreprise', 
	REPENT='$RepresentantE',
	QUALITEREP='$QualiteRepresentantE',
	ADRUEENT='$AdresseE',
	CPENT='$CodePostalE',
	VILLEENT='$VilleE',
	TELENT='$TelephoneE',
	ACTENT='$actE'
	WHERE NOENT=$donnees";
		
	$req = $connexion->exec($sql);
	
	header("location:../RechercheDeStages/RechercheModifierEntreprise.php");
	
?>