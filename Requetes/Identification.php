<?php
//Fait par Thomas David Tous droits réservés
	session_start();

	// Récupération des données saisies dans le formulaire de connexion
	$Pseudo=$_POST['Identifiant'];
	$MotDePasse=$_POST['MotDePasse'];
	$MotDePasseMD5 = /*md5*/($MotDePasse);

	// Fichier php de Connexion à la base de données mysql 
	include("Connexion.php");		
							
	// Requête de recherche du mot de passe de l'administrateur à partir des identifiants saisis		
	$reqEleve = "SELECT NOETUD, PROMOTION FROM etudiant WHERE MELETUD='$Pseudo' AND MOTPASSE='$MotDePasseMD5'";		
	$sqlEleve = $connexion->query($reqEleve);
	$ligneEleve = $sqlEleve->fetch();
	$_SESSION['noetud']=$ligneEleve['NOETUD'];
	$_SESSION['promotion']=$ligneEleve['PROMOTION'];
	
	$reqProfesseur = "SELECT PRENOMPROF, MOTPASSE FROM professeur WHERE PRENOMPROF='$Pseudo' AND MOTPASSE='$MotDePasseMD5'";
	$sqlProfesseur = $connexion->query($reqProfesseur);	
	$ligneProfesseur = $sqlProfesseur->fetch();
	$_SESSION['pseudoprof']=$ligneProfesseur;
	$_SESSION['pseudoeleve']=$ligneEleve;
	
	if($ligneEleve == true){
		// Création d'une variable de session (le pseudo ou nom de l'administrateur)	
		$_SESSION['pseudo']=$Pseudo;
		header("location:../Commun/Accueil.php");
		
	}else if($ligneProfesseur == true){
		header("location:../Commun/Accueil.php");
		
	}else{
		header("location:../Commun/Index.php");		
	}		
	// Fermeture de la connexion à MySql
	exit;		
?>