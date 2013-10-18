<html>
<!--Fait par Thomas David Tous droits réservés-->
	<?php
		session_start();
		
		include ("../Requetes/Connexion.php");
		
		//Appel de la page d'en tête
		include ("../Commun/EnTete.php");
	?>	
	
	<div id="BarreSousMenu"><center>Consultation des Entreprises qui accueillent des stagiaires</center></div>
	<body>	
	
	<div id="corps">
	<br/>		
	
	<?php
	
		// Requête 		
		$sql = "SELECT NOMENT, REPENT, QUALITEREP, ADRUEENT, CPENT, VILLEENT, TELENT, ACTENT
		FROM entreprise, stage
		WHERE entreprise.NOENT=stage.NOENT
		ORDER BY NOMENT";
	?>
	
	<table class="affichage">
	<thead>
	<tr><th>Nom de l'entreprise</th>
	<th>Représentant</th>
	<th>Qualité</th>
	<th>Adresse</th>
	<th>Code Postal</th>
	<th>Ville</th>
	<th>Téléphone</th>
	<th>Activité</th>
	</tr>
	</thead>
	
	<?php	
		//Exécution de la requete
		$requete = $connexion->query($sql);
		$ligne = $requete->fetch();

		//Boucle qui permet d'afficher ligne par ligne une entreprise séléctionnée
	?>	
	<tbody>
	<?php
		while($ligne == TRUE){
	?>			
			<tr class="gris"><td class="gris"><?php echo $ligne['NOMENT']; ?></td>
			<td class="gris"><?php echo $ligne['REPENT']; ?></td>
			<td class="gris"><?php echo $ligne['QUALITEREP']; ?></td>
			<td class="gris"><?php echo $ligne['ADRUEENT']; ?></td>
			<td class="gris"><?php echo $ligne['CPENT']; ?></td>
			<td class="gris"><?php echo $ligne['VILLEENT']; ?></td>
			<td class="gris"><?php echo $ligne['TELENT']; ?></td>
			<td class="gris"><?php echo $ligne['ACTENT']; ?></td></tr>
			<?php $ligne = $requete->fetch(); ?>
			
	<?php		
		}
	?>
	</table>
	</tbody>
	<?php
		exit;
	?>

	</div>	
	</form>   
	</center>       
	</body>
</html>
