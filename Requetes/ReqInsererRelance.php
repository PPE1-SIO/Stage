<?php
	//Fait par Thomas David Tous droits r�serv�s
	session_start();

	// Fichier php de Connexion � la base de donn�es mysql 
	include ("../Requetes/Connexion.php");
	

	//R�cup�ration des donn�es du formulaire de demande de stage
	$NumEntreprise = $_POST['EnvoieNumEnt'];
	$ModeContact = $_POST['lstRechercherContact'];
	$DateDemande = $_POST['DateDemande'];	
	$Date = date('Y-m-d',strtotime($DateDemande));		
	
	$reqRecupDemande = "SELECT NUMDEMANDE FROM demande WHERE NOENT='$NumEntreprise'";
	$sqlDemande = $connexion->query($reqRecupDemande);
	$Donnees = $sqlDemande->fetch();
	$ligne = $Donnees['NUMDEMANDE'];
	
	//Lancement de la requete qui permet d'enregistrer une demande de stage
	$req = "INSERT INTO relance (NUMMODE, NUMDEMANDE, DATERELANCE) 
	VALUES ($ModeContact, $ligne, '$Date')";
	
	$sqlInsertionDemande = $connexion->exec($req);	
	
	//Redirection
	header("location:../RechercheDeStages/ConfirmationDemandeStage.php");
?>