<html>
<!--Fait par Nicolas Rivault-->
<!--Dernieres modification : 02/12/2013 -->
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

	<tbody>
	<?php
		if( isset($_GET['page']) && is_numeric($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page = 1;
		}
		$pagination = 10;
		$limit_start = ($page - 1) * $pagination;
		$sql = "SELECT * FROM entreprise LIMIT $limit_start, $pagination";
		$result = $connexion->query($sql);
		$resultat = $result->fetch();
		
		while($resultat == TRUE){ 
		?>
			<tr class="gris"><td class="gris"><?php echo $resultat['NOMENT']; ?></td>
			<td class="gris"><?php echo $resultat['REPENT']; ?></td>
			<td class="gris"><?php echo $resultat['QUALITEREP']; ?></td>
			<td class="gris"><?php echo $resultat['ADRUEENT']; ?></td>
			<td class="gris"><?php echo $resultat['CPENT']; ?></td>
			<td class="gris"><?php echo $resultat['VILLEENT']; ?></td>
			<td class="gris"><?php echo $resultat['TELENT']; ?></td>
			<td class="gris"><?php echo $resultat['ACTENT']; ?></td></tr>
			<?php $resultat = $result->fetch(); ?>
		<?php
		}

		$total = $connexion->query('SELECT COUNT( * ) FROM entreprise');
		$totals = $total->fetch();

		$nb_pages = ceil($totals[0] /$pagination);
		
		echo '<p>[ Page :';
		for ($i = 1 ; $i <= $nb_pages; $i++) {
			if ($i == $page )
				echo " $i";
			else
				echo " <a href=\"?page=$i\">$i</a> ";
		}
		echo ' ]</p>';
		
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
