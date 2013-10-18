<html>
<!--Fait par Thomas David Tous droits réservés-->
	<?php
		session_start();
		
		include ("../Requetes/Connexion.php");
		
		//Appel de la page d'en tête
		include ("../Commun/EnTete.php");
	?>	
	
	<div id="BarreSousMenu"><center>Consultation des Entreprises par Option</center></div>
	<body>	
	
	<div id="corps">
	<br/>		
	
	<?php
		$id_recherche = $_POST['optEntrepriseContactee'];
		
		// Requête 		
		$sql = "SELECT NOMENT, REPENT, NOMETUD, QUALITEREP, ADRUEENT, CPENT, VILLEENT, TELENT, ACTENT
		FROM etudiant
		INNER JOIN demande
		ON demande.NOETUD=etudiant.NOETUD
		INNER JOIN entreprise 
		ON entreprise.NOENT=demande.NOENT
		WHERE FORMATION = '$id_recherche'
		ORDER BY NOMENT"; 
	?>
	
	<table class="affichage">
	<thead>
	<tr>
	<th>Nom de l'entreprise</th>
	<th>Représentant</th>
	<th>élève ayant contacté l'entreprise</th>
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
			<td class="gris"><?php echo $ligne['NOMETUD']; ?></td>
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
