<html>
<!--Fait par Nicolas Rivault-->
<!--Dernieres modification : 14/10/2013 -->
<?php
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
	$reqex = "SELECT * FROM entreprise WHERE NOMENT='$NomEntreprise' AND REPENT='$RepresentantE'";
	$resreq = $connexion->query($reqex);
	$resfet = $resreq->fetch();
	
	
	
	if(empty($resfet)){
		$sql = "INSERT INTO entreprise (NOMENT, REPENT, QUALITEREP, ADRUEENT, CPENT, VILLEENT, TELENT, ACTENT) VALUES ('$NomEntreprise', '$RepresentantE', '$QualiteRepresentantE', '$AdresseE', '$CodePostalE', '$VilleE', '$TelephoneE', '$actE')";  
		$req = $connexion->exec($sql);
?>	
	<script language="JavaScript">
		alert("L'entreprise � bien �t� cr��e");
		document.location.href="../RechercheDeStages/SaisirEntreprise.php"
	</script>
<?php
	}else{
?>
	<script language="JavaScript">
		alert("L'entreprise existe d�j�");
		document.location.href="../RechercheDeStages/SaisirEntreprise.php"
	</script>
<?php
	}
?>
</html>