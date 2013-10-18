<html>
<!--Fait par Thomas David Tous droits réservés-->
	<?php
		session_start();
		
		include ("../Requetes/Connexion.php");	
		
			//Appel de la page d'en tête
		include ("../Commun/EnTete.php");
	?>	
	
	<div id="BarreSousMenu"><center>Mes Relances</center></div>
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
		$sql = "SELECT NOMENT, REPENT, QUALITEREP, ADRUEENT, CPENT, VILLEENT, TELENT, ACTENT, DATERELANCE, LIBELLEETAT
		FROM entreprise, etudiant, demande, relance, etat
		WHERE entreprise.NOENT=demande.NOENT
		AND demande.NOETUD=etudiant.NOETUD
		AND demande.NUMDEMANDE=relance.NUMDEMANDE
		AND demande.NUMETAT=etat.NUMETAT
		AND demande.NOETUD ='$NumEtudiant'";
		
	?>
	
	<table id="affichage">
	<thead>
	<tr><th>Nom de l'entreprise</th>
	<th>Représentant</th>
	<th>Adresse</th>
	<th>Code Postal</th>
	<th>Ville</th>
	<th>Téléphone</th>
	<th>Date de la relance</th>
	<th>Etat de la demande</th>
	</tr>
	</thead>
	
	<?php	
		//Exécution de la requete
		$requete = $connexion->query($sql);
		$ligne = $requete->fetch();
		$DateDemande = $ligne['DATERELANCE'];
		$Date = date('d-m-Y',strtotime($DateDemande));
		//Boucle qui permet d'afficher ligne par ligne une entreprise séléctionnée
	?>	
	<tbody>
	<?php
		while($ligne == TRUE){
	?>			
			<tr class="gris"><td class="gris"><?php echo $ligne['NOMENT']; ?></td>
			<td class="gris"><?php echo $ligne['REPENT']; ?></td>
			<td class="gris"><?php echo $ligne['ADRUEENT']; ?></td>
			<td class="gris"><?php echo $ligne['CPENT']; ?></td>
			<td class="gris"><?php echo $ligne['VILLEENT']; ?></td>
			<td class="gris"><?php echo $ligne['TELENT']; ?></td>
			<td class="gris"><?php echo $Date; ?></td>
			<td class="gris"><?php echo $ligne['LIBELLEETAT']; ?></td></tr>
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
