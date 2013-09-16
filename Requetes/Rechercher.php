	<?php
		session_start();
	
		//Appel de la page de connexion
		include ("../Requetes/Connexion.php");
		
		$id_recherche = $_POST['optEntrepriseContactee'];	
	
		// Requête 		
		$sql = "SELECT NOMENT, REPENT, QUALITEREP, ADRUEENT, CPENT, VILLEENT, TELENT, ACTENT
		FROM entreprise, etudiant, demande
		WHERE entreprise.NOENT=demande.NOENT
		AND demande.NOETUD=etudiant.NOETUD
		AND FORMATION = '$id_recherche'"; 		
		
		//Exécution de la requete
		$requete = $connexion->query($sql);
		$ligne = $requete->fetch();

		//Boucle qui permet d'afficher ligne par ligne une entreprise séléctionnée
		while($ligne == TRUE){
		?>
			<table>
			<tr><td><?php echo $ligne['NOMENT']; ?></td>
			<td><?php echo $ligne['REPENT']; ?></td>
			<td><?php echo $ligne['QUALITEREP']; ?></td>
			<td><?php echo $ligne['ADRUEENT']; ?></td>
			<td><?php echo $ligne['CPENT']; ?></td>
			<td><?php echo $ligne['VILLEENT']; ?></td>
			<td><?php echo $ligne['TELENT']; ?></td>
			<td><?php echo $ligne['ACTENT']; ?></td></tr>
			<?php $ligne = $requete->fetch(); ?>
			</table>
		<?php
		}
		exit;
	?>	