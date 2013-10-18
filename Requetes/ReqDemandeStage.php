<?php
	//Fait par Thomas David Tous droits r�serv�s
	session_start();

	// Fichier php de Connexion � la base de donn�es mysql 
	include ("Connexion.php");

	//R�cup�ration des donn�es du formulaire de demande de stage
	$NumEntreprise = $_POST['lstRechercherEntreprise'];
	$PseudoEleve = $_SESSION['pseudoeleve'];
	$NumEtudiant = $PseudoEleve['NOETUD'];
	
	$DateDemande = $_POST['DateDemande'];	
	$Date = date('Y-m-d',strtotime($DateDemande));	
	
	$PersonneContactee = $_POST['txtNom'];
	$ModeContact = $_POST['lstRechercherContact']; 
	
	//Lancement de la requete qui permet d'enregistrer une demande de stage
	if($Date == "1970-01-01" || $Date >= date("Y/m/d")){
	?>
	<script language="JavaScript">
		alert("Erreur dans la date de saisie");
		document.location.href="../RechercheDeStages/AjouterDemandeStage.php"
	</script>
	<?php
	}else{
	$req = "INSERT INTO demande (NOENT, NOETUD, NUMETAT, DATEDEMANDE, NOMPERSCONTACTEE, NUMMODE) 
	VALUES ($NumEntreprise, $NumEtudiant, 1,'$Date', '$PersonneContactee', $ModeContact)";	
	$sqlInsertionDemande = $connexion->exec($req);	
	?>	
	<script language="JavaScript">
		alert("La demande de stage a bien �t� cr��e");
		document.location.href="../RechercheDeStages/AjouterDemandeStage.php"
	</script>
<?php
	}
?>