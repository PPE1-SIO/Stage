<html>
<!--Fait par Thomas David Tous droits r�serv�s-->
	<?php
		session_start();
		
		include ("../Requetes/Connexion.php");
		
		//Appel de la page d'en t�te
		include ("../Commun/EnTete.php");
	?>	
	
	<div id="BarreSousMenu"><center>Consultation des Entreprises par Option</center></div>
	<body>	
	
	<div id="corps">
	<br/>		
	
	<?php
		$id_recherche = $_POST['optEntrepriseContactee'];
		
		// Requ�te 		
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
	<th>Repr�sentant</th>
	<th>�l�ve ayant contact� l'entreprise</th>
	<th>Qualit�</th>
	<th>Adresse</th>
	<th>Code Postal</th>
	<th>Ville</th>
	<th>T�l�phone</th>
	<th>Activit�</th>
	</tr>
	</thead>
	
	<?php	
		//Ex�cution de la requete
		$requete = $connexion->query($sql);
		$ligne = $requete->fetch();	

		//Boucle qui permet d'afficher ligne par ligne une entreprise s�l�ctionn�e
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
