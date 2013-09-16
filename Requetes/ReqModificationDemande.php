<?php
	//Fait par Thomas David Tous droits réservés
	session_start();

	// Fichier php de Connexion à la base de données mysql 
	include ("Connexion.php");
	//include ("Verification.php");

	//Récupération des données du formulaire de demande de stage
	$NumEntreprise = $_SESSION['noentrep'];
	$NumEtudiant = $_SESSION['noetud'];
	$EtatDemande = $_POST['lstRechercherEtat'];
	$DateDemande = $_POST['DateDemande'];	
	$Date = date('Y-m-d',strtotime($DateDemande));	
	$PersonneContactee = $connexion->quote($_POST['PersonneContactee']);
	$ModeContact = $_POST['lstRechercherContact'];
	
	
	//Lancement de la requete qui permet d'enregistrer une demande de stage
	$req = "UPDATE demande
	SET NUMETAT=$EtatDemande, DATEDEMANDE='$Date', NOMPERSCONTACTEE=$PersonneContactee, NUMMODE=$ModeContact
	WHERE NOENT=$NumEntreprise
	AND NOETUD=$NumEtudiant";
	
	$sqlInsertionDemande = $connexion->exec($req);	
	
	//Redirection
	header("location:../RechercheDeStages/ConfirmationDemandeStage.php");
?>