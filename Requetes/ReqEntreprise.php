<?php
	//Fait par Thomas David Tous droits r�serv�s
	session_start();

	// Fichier php de Connexion � la base de donn�es mysql 
	include ("Connexion.php");

	// R�cup�ration des donn�es saisies dans le formulaire de la demande de stage
	$NomEntreprise = $_POST['txtNom'];
	$RepresentantE = $_POST['txtRepEnt'];
	$QualiteRepresentantE = $_POST['txtQR'];
	$AdresseE = $_POST['txtAd'];
	$CodePostalE = $_POST['txtCP'];
	$VilleE = $_POST['txtVille'];
	$TelephoneE = $_POST['txtTel'];
	$actE = $_POST['txtActE'];
		
	// lancement de la requete
	$sql = "INSERT INTO entreprise (NOMENT, REPENT, QUALITEREP, ADRUEENT, CPENT, VILLEENT, TELENT, ACTENT) VALUES ('$NomEntreprise', '$RepresentantE', '$QualiteRepresentantE', '$AdresseE', '$CodePostalE', '$VilleE', '$TelephoneE', '$actE')";  
	$req = $connexion->exec($sql);

	header("location:../RechercheDeStages/RechercheStages.php");		
?>