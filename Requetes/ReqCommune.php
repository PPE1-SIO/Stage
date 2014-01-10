<html>
<!--Fait par Ronan Leger-->
<!--Dernieres modification : 02/12/2013 -->
<?php
	//Fait par Thomas David Tous droits réservés
	session_start();

	// Fichier php de Connexion à la base de données mysql 
	include ("Connexion.php");

	// Récupération des données saisies dans le formulaire de la demande de stage
	
	$Com_Nom = $_POST['txtVille'];
	$Com_CodePostal = $_POST['txtCP'];
		
	// lancement de la requete
	$reqex = "SELECT * FROM commune WHERE Com_Nom='$Com_Nom' AND Com_CodePostal='$Com_CodePostal'";
	$resreq = $connexion->query($reqex);
	$resfet = $resreq->fetch();
	
	
	
	if(empty($resfet)){
		$sql = "INSERT INTO commune (Com_Nom, Com_CodePostal) VALUES ('$Com_Nom', '$Com_CodePostal')";  
		$req = $connexion->exec($sql);
?>	
	<script language="JavaScript">
		alert("La commune à bien été créée");
		document.location.href="../RechercheDeStages/SaisirEntreprise.php"
	</script>
<?php
	}else{
?>
	<script language="JavaScript">
		alert("L'entreprise existe déjà");
		document.location.href="../RechercheDeStages/SaisirEntreprise.php"
	</script>
<?php
	}
?>
</html>