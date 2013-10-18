<html>
<!--Fait par Thomas David Tous droits réservés-->
	<?php
		session_start();

		//Appel de la page de connexion
		include ("../Requetes/Connexion.php");
		
		//Appel de la page d'en tête
		include ("../Commun/EnTete.php");
	?>	
	<div id="BarreSousMenu"><center>Modifier une Demande de Stage</center></div>
	<body>	
			
	<div id="corps">
	<br/>	
	<center>Entreprise : 
	<form method="post" action="../RechercheDeStages/ModificationDemande.php">
	
	<?php
		$NumEtudiant = $_SESSION['noetud'];		
		
		//Préparation de la requete dans une variable
		$sql = "SELECT NOMENT, demande.NOENT 
		FROM demande, entreprise 
		WHERE demande.NOENT=entreprise.NOENT 
		AND NOETUD='$NumEtudiant'";		
		
		// Execution de la requete sql
		$requete = $connexion->query($sql);
		$ligne = $requete->fetch();
	?>
	
	<select name='lstModifierDemande' class="champ">
	
	<?php
		//Affichage
	 	while($ligne == TRUE){
			$NOMENT = $ligne['NOMENT'];
			$NOENT = $ligne['NOENT'];
			echo"<option value='$NOENT' >$NOMENT</option>";	
			$ligne = $requete->fetch();							
		}		
	?>	
			
	</option>
	<input type="submit" name="submit" value="Modifier"/><br/><br/>
	<hr/></center>
	<br/>
	</table>
	</div>	
	</form>   
	</center>       
   </body>
</html>
