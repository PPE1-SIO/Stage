<html>
<!--Fait par Thomas David Tous droits r�serv�s-->
	<?php
		session_start();
		
		include ("../Requetes/Connexion.php");
		
		//Appel de la page d'en t�te
		include ("../Commun/EnTete.php");
	?>	
	
	<div id="BarreSousMenu"><center>Relancer une demande de stage</center></div>
	<body>	
	
	<?php
		//Appel de la page du menu de gauche
		include ("MenuGauche.php");
	?>

	<div id="corps">
	<br/>
	<form method="post" action="../Requetes/ReqInsererRelance.php" onsubmit="return verifFonctionsRelanceStage(this)">
	
	<?php 
		$NoEnt = $_POST['lstAjouterRelance'];
		$reqRecupNomEnt = "SELECT NOMENT FROM entreprise WHERE NOENT='$NoEnt'";
		$sqlRecupNomEnt = $connexion->query($reqRecupNomEnt);
		$ligneRecup = $sqlRecupNomEnt->fetch();
	?>
	<table class="tb1">
	<tr><td>Nom de l'entreprise : </td><td><?php echo $ligneRecup['NOMENT']; ?></td></tr>
	<tr><td>Mode de contact :</td> 
	
	<?php
		//Pr�paration de la requete pour afficher dans une liste d�roulante les modes de contact
		$sql = "SELECT NUMMODE, LIBELLEMODE FROM modecontact";		
		
		// Execution de la requete sql
		$requete = $connexion->query($sql);
		$ligne = $requete->fetch();
	?>
	
	<td><select name='lstRechercherContact' class="champ">
	
	<?php 
		//Affichage 
	 	while($ligne == TRUE){
			$LIBELLEMODE = $ligne['LIBELLEMODE'];
			$NUMMODE = $ligne['NUMMODE'];
			echo"<option value='$NUMMODE'>$LIBELLEMODE</option>";	
			$ligne = $requete->fetch();							
		}
	?>

	</select>
	<tr>
	<td>Date (JJ-MM-AA) :</td> 
	<td><input type="text" name="DateDemande" class="champ" onblur="verifDateDemande(this)" value=""/>*</td>
	</tr>
        <input type="hidden" name="EnvoieNumEnt" value="<?php echo $NoEnt; ?>">
	<tr><td><input class="boutton2" type="submit" name="submit" value="Enregistrer"></td>            
	</form>	        
	<form method="post" action="AjouterRelance.php">
	<td><input class="boutton2" type="submit" name="submit" value="Nouveau"/></td></tr>
        
	</form>