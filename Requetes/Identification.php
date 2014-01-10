
<html>
<!--Fait par Nicolas Rivault-->
<!--Dernieres modification : 02/12/2013 -->
<?php

	session_start();

	// Récupération des données saisies dans le formulaire de connexion
	$Pseudo=$_POST['Identifiant'];
	$MotDePasse=$_POST['MotDePasse'];
	$MotDePasseMD5 = /*md5*/($MotDePasse);

	// Fichier php de Connexion à la base de données mysql 
	include("Connexion.php");		
								
	// Requête de recherche du mot de passe de l'administrateur à partir des identifiants saisis		
	$reqEleve = "SELECT NOMETUD, PROMOTION, NOETUD FROM etudiant WHERE MELETUD='$Pseudo' AND MOTPASSE='$MotDePasseMD5'";		
	$sqlEleve = $connexion->query($reqEleve);
	$ligneEleve = $sqlEleve->fetch();

	$reqProfesseur = "SELECT NOMPROF, MOTPASSE FROM professeur WHERE MELPROF='$Pseudo' AND MOTPASSE='$MotDePasseMD5'";
	$sqlProfesseur = $connexion->query($reqProfesseur);	
	$ligneProfesseur = $sqlProfesseur->fetch();
	
	$_SESSION['pseudoprof']=$ligneProfesseur;
	$_SESSION['pseudoeleve']=$ligneEleve;
		
	if($ligneEleve == true)
	{
		// Création d'une variable de session (le pseudo ou nom de l'administrateur)	
		$_SESSION['pseudo']=$Pseudo;
?>
	<script language="JavaScript">
		alert("Connexion réussie en tant qu'élève");
		document.location.href="../Commun/Accueil.php"
	</script>	
<?php		
	}else if($ligneProfesseur == true){
?>	
	<script language="JavaScript">
		alert("Connexion réussie en tant que professeur");
		document.location.href="../Commun/Accueil.php"
	</script>	
<?php	
	}else{
?>
	<script language="JavaScript">
		alert('Mot de passe ou identifiant incorrect');
		document.location.href="../Commun/index.php"
	</script>
<?php
	}		
	// Fermeture de la connexion à MySql
	exit;		
?>
</html>