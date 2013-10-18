<!--RAMADANI Arbër 15/06/2012-->
<?php 
include('../Requetes/connexion.php');//ouverture de la connexion

//recupération des variables 

	$num = $_POST['txtNoEtud'];
	$nom = $_POST['txtNom'];
	$prenom = $_POST['txtPrenom'];
	$dn = $_POST['txtDN'];
	$Date = date('Y-m-d',strtotime($dn)); //mise en forme pour insérer dans mySQL
	$ad = $_POST['txtAd'];
	$cp = $_POST['txtCP'];
	$ville = $_POST['txtVille'];
	$tel = $_POST['txtTel'];
	$mail = $_POST['txtMail'];
	$opt = $_POST['optSio'];
	$mp = $_POST['txtMp'];
	$annee = $_POST['optAnnee'];
	$prom = $_POST['txtProm'];
	
	//requête de modification
	
	$req = "Update etudiant SET NOMETUD='$nom', PRENOMETUD='$prenom', DATENAISS='$Date', ADRUEETUD='$ad', 
	CPETUD='$cp', VILLEETUD='$ville', TELETUD='$tel', MELETUD='$mail', FORMATION='$opt', MOTPASSE='$mp', 
	ANNEESIO='$annee', PROMOTION='$prom' 
	where '$num'=NOETUD";
	
	$connexion->exec($req);
	
	header('Location: ../SuiviDeStages/RechercheEtudiant.php');
	

?>