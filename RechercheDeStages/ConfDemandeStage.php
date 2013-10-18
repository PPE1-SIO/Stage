<html>	
<!--Fait par Thomas David Tous droits réservés-->
	<?php
		session_start();
		
		//Appel de la page connexion.php
		include ("../Requetes/Connexion.php");	
	?>
	
	<?php	
		//Appel de la page d'en tête
		include ("../Commun/EnTete.php");
	?>	
	
	<body>	
	
	<?php
		//Appel de la page du menu de gauche
		include ("MenuGauche.php");
	?>
			
	<div id="corps">
	<br/>	
	<center>
	
	<?php
		// Récupération des données saisies dans le formulaire de la demande de stage
		$NumEntreprise = $_POST['lstRechercherEntreprise'];
		$NumEtudiant = $_SESSION['noetud'];
		$EtatDemande = $_POST['lstRechercherEtat'];
		$DateDemande = $_POST['DateDemande'];	
		$Date = date('Y-m-d',strtotime($DateDemande));	
		$PersonneContactee = $connexion->quote($_POST['PersonneContactee']);
		$ModeContact = $_POST['lstRechercherContact'];
	?>
	<form method="post" action="../Requetes/ReqDemandeStage.php">
	<table>
	<tr>
	<td>Nom de l'entreprise : </td><td><?php echo $NumEntreprise;?></td>
	</tr><tr>	
	<td>Etat de la demande : </td><td><?php echo $EtatDemande;?></td>
	</tr><tr>	
	<td>Date de la demande : </td><td><?php echo $DateDemande;?></td>
	</tr><tr>
	<td>Personne contactée : </td><td><?php echo $PersonneContactee;?></td>
	</tr><tr>
	<td>Mode de contact : </td><td><?php echo $ModeContact;?></td>
	</tr><tr>
	</table>
	Confirmez-vous l'insertion de cette nouvelle entreprise ?
	<input class="boutton2" type="submit" name="submit" value="Enregistrer">
	<input type="hidden" name="lstRechercherEntreprise" value="<?php echo $NumEntreprise;?>">
	<input type="hidden" name="noetud" value="<?php echo $NumEtudiant;?>">
	<input type="hidden" name="lstRechercherEtat" value="<?php echo $EtatDemande;?>">
	<input type="hidden" name="DateDemande" value="<?php echo $Date;?>">
	<input type="hidden" name="PersonneContactee" value="<?php echo $PersonneContactee;?>">
	<input type="hidden" name="lstRechercherContact" value="<?php echo $ModeContact;?>">
	<hr/></center>
	<br/>
	</table>
	</div>	
	</form>   
	</center>       
   </body>
</html>
