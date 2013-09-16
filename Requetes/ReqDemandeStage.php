<?php
	//Fait par Thomas David Tous droits réservés
	session_start();

	// Fichier php de Connexion à la base de données mysql 
	include ("Connexion.php");
	//include ("Verification.php");

	//Récupération des données du formulaire de demande de stage
	$NumEntreprise = $_POST['lstRechercherEntreprise'];
	$NumEtudiant = $_SESSION['noetud'];
	$EtatDemande = $_POST['lstRechercherEtat'];
	$DateDemande = $_POST['DateDemande'];	
	$Date = date('Y-m-d',strtotime($DateDemande));	
	$PersonneContactee = $_POST['txtNom'];
	$ModeContact = $_POST['lstRechercherContact'];
	
	
	//Lancement de la requete qui permet d'enregistrer une demande de stage
	$req = "INSERT INTO demande (NOENT, NOETUD, NUMETAT, DATEDEMANDE, NOMPERSCONTACTEE, NUMMODE) 
	VALUES ($NumEntreprise, $NumEtudiant, 1,'$Date', '$PersonneContactee', $ModeContact)";	
	$sqlInsertionDemande = $connexion->exec($req);	
	
	//Redirection
	header("location:../RechercheDeStages/ConfirmationDemandeStage.php");
?>