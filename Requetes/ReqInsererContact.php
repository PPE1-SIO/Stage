﻿<html>
<!--Fait par Nicolas Rivault-->
<!--Dernieres modification : 02/12/2013 -->
<?php
	session_start();
	
	//Appel de la page de connexion � la base de donn�es MySql
	include ("../Requetes/Connexion.php");
	
	//R�cup�ration des variables de la page InsererContact.php
	$ModeContact = $_POST['txtNom'];
	
	$reqmodexistant = "SELECT NUMMODE FROM modecontact WHERE LIBELLEMODE = '$ModeContact'";
	$reqmodexistantex = $connexion->query($reqmodexistant);
	$reqmodexistantfet = $reqmodexistantex->fetch();

	if($reqmodexistantfet['NUMMODE'] || empty($ModeContact))
	{
	?>
	<script language="JavaScript">
		alert("Erreur ! Veuillez Réessayer.");
		document.location.href="../RechercheDeStages/AjouterDemandeStage.php"
	</script>	
	<?php		
	}else{
		$req = "INSERT INTO modecontact (LIBELLEMODE) VALUES ('$ModeContact')";
		$reqex = $connexion->exec($req);
	?>
	<script language="JavaScript">
		alert("Ajout réussis.");
		document.location.href="../RechercheDeStages/AjouterDemandeStage.php"
	</script>	
	<?php	
	}
?>
</html>