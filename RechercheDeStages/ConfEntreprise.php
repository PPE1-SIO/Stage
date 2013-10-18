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
		$NomEntreprise = $_POST['txtNom'];
		$RepresentantE = $_POST['txtRepEnt'];
		$QualiteRepresentantE = $_POST['txtQR'];
		$AdresseE = $_POST['txtAd'];
		$CodePostalE = $_POST['txtCP'];
		$VilleE = $_POST['txtVille'];
		$TelephoneE = $_POST['txtTel'];
		$actE = $_POST['actE'];
	?>
	<form method="post" action="../Requetes/ReqEntreprise.php">
	<table>
	<tr>
	<td>Nom de l'entreprise : </td><td><?php echo $NomEntreprise;?></td>
	</tr><tr>	
	<td>Nom du repésentant : </td><td><?php echo $RepresentantE;?></td>
	</tr><tr>	
	<td>Qualité du représentant : </td><td><?php echo $QualiteRepresentantE;?></td>
	</tr><tr>
	<td>Adresse de l'entreprise : </td><td><?php echo $AdresseE;?></td>
	</tr><tr>
	<td>Code Postal : </td><td><?php echo $CodePostalE;?></td>
	</tr><tr>
	<td>Ville : </td><td><?php echo $VilleE;?></td>
	</tr><tr>
	<td>Téléphone : </td><td><?php echo $TelephoneE;?></td>
	</tr><tr>
	<td>Activité de l'entreprise : </td><td><?php echo $actE;?></td>
	</tr><tr>	
	Confirmez-vous l'insertion de cette nouvelle entreprise ?
	<input class="boutton2" type="submit" name="submit" value="Enregistrer">	
	<input type="hidden" name="NomEntreprise" value="<?php echo $NomEntreprise;?>">
	<input type="hidden" name="RepresentantE" value="<?php echo $RepresentantE;?>">
	<input type="hidden" name="QualiteRepresentantE" value="<?php echo $QualiteRepresentantE;?>">
	<input type="hidden" name="AdresseE" value="<?php echo $AdresseE;?>">
	<input type="hidden" name="CodePostalE" value="<?php echo $CodePostalE;?>">
	<input type="hidden" name="VilleE" value="<?php echo $VilleE;?>">
	<input type="hidden" name="TelephoneE" value="<?php echo $TelephoneE;?>">
	<input type="hidden" name="actE" value="<?php echo $actE;?>">
	</form>
	<form method="post" action="SaisirEntreprise.php">
	<input class="boutton2" type="submit" name="submit" value="Retour">
	<input type="hidden" name="NomEntreprise" value="<?php echo $NomEntreprise;?>">
	<input type="hidden" name="RepresentantE" value="<?php echo $RepresentantE;?>">
	<input type="hidden" name="QualiteRepresentantE" value="<?php echo $QualiteRepresentantE;?>">
	<input type="hidden" name="AdresseE" value="<?php echo $AdresseE;?>">
	<input type="hidden" name="CodePostalE" value="<?php echo $CodePostalE;?>">
	<input type="hidden" name="VilleE" value="<?php echo $VilleE;?>">
	<input type="hidden" name="TelephoneE" value="<?php echo $TelephoneE;?>">
	<input type="hidden" name="actE" value="<?php echo $actE;?>">
	</form>
	<hr/></center>		
	</div>	
	
	</table>
	<br/>
	</center>       
   </body>
</html>
