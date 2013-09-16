<html>
<!--Fait par Thomas David Tous droits réservés-->
	<?php
		session_start();
		
		include ("../Requetes/Connexion.php");
		
		//Appel de la page d'en tête
		include ("../Commun/EnTete.php");
	?>	
	
	<div id="BarreSousMenu"><center>Mes Recherches</center></div>
	<body>	
	
	<?php	
		//Appel de la page du menu de gauche
		include ("MenuGauche.php");
	?>
	
	<div id="corps">
	<br/>		
	
	<?php
		$NumEtudiant = $_SESSION['noetud'];
	
		// Requête 		
		$req = "SELECT NOMENT, REPENT, QUALITEREP, ADRUEENT, CPENT, VILLEENT, TELENT, ACTENT, LIBELLEETAT, DATEDEMANDE, NUMDEMANDE
		FROM entreprise, etudiant, demande, etat
		WHERE entreprise.NOENT=demande.NOENT
		AND demande.NOETUD=etudiant.NOETUD
		AND etat.NUMETAT=demande.NUMETAT
		AND demande.NOETUD ='$NumEtudiant'
		ORDER BY DATEDEMANDE";
		
		
		
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
	<th>Etat</th>
	<th>Date de la demande</th>
	<th>Nombre de relances</th>
	</tr></thead>
	
	<?php	
		//Exécution de la requete
		$sql = $connexion->query($req);
		$ligne = $sql->fetch();
		$DateDemande = $ligne['DATEDEMANDE'];
		$Date = date('d-m-Y',strtotime($DateDemande));		

		//Boucle qui permet d'afficher ligne par ligne une entreprise séléctionnée
	?>
	<tbody>
	<?php
		while($ligne == TRUE){
		$ligneRelance = $ligne['NUMDEMANDE'];
		$reqNbRelance = "SELECT count(NUMDEMANDE) AS NombreRelance FROM relance WHERE NUMDEMANDE='$ligneRelance'";
		$sqlNbRelance = $connexion->query($reqNbRelance);
		$ligneNbRelance = $sqlNbRelance->fetch();
	?>			
			<tr class="gris"><td class="gris"><?php echo $ligne['NOMENT']; ?></td>
			<td class="gris"><?php echo $ligne['REPENT']; ?></td>
			<td class="gris"><?php echo $ligne['QUALITEREP']; ?></td>
			<td class="gris"><?php echo $ligne['ADRUEENT']; ?></td>
			<td class="gris"><?php echo $ligne['CPENT']; ?></td>
			<td class="gris"><?php echo $ligne['VILLEENT']; ?></td>
			<td class="gris"><?php echo $ligne['TELENT']; ?></td>
			<td class="gris"><?php echo $ligne['ACTENT']; ?></td>
			<td class="gris"><?php echo $ligne['LIBELLEETAT']; ?></td>
			<td class="gris"><?php echo $Date; ?></td>
			<td class="gris"><?php echo $ligneNbRelance['NombreRelance']; ?></td></tr>
			<?php $ligne = $sql->fetch(); ?>
			
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
