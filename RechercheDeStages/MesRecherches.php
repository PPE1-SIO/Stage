<html>
<!--Fait par Pierrick Chevessier-->
<!--Dernieres modification : 02/12/2013 -->
	<?php
		session_start(); 
		include ("../Requetes/Connexion.php");
		
		
		//Appel de la page d'en t�te
		include ("../Commun/EnTete.php");
	?>	
	
	<div id="BarreSousMenu"><center>Mes Recherches</center></div>
	<body>	
	<div id="corps">
	<br/>		
	
	<?php
		$NumEtudiant = $PseudoEleve['NOETUD'];
	
		// Requ�te 		
		$req = "SELECT * FROM DEMANDE WHERE NOETUD='$NumEtudiant'";
		
	?>
	
	<table class="affichage">
	<thead>
	<tr><th>Num�ro de Demande</th>
	<th>Num�ro entreprise</th>
	<th>Num�ro �tudiant</th>
	<th>Num �tat</th>
	<th>Date Demande</th>
	<th>Nom du contact</th>
	<th>Num�ro de l'�tat </th>
	<th>Nombre de relance</th>
	<th>Date derni�re relance</th>

	</tr></thead>
	
	<?php	
		//Ex�cution de la requete
		$sql = $connexion->query($req);
		$ligne = $sql->fetch();
		$DateDemande = $ligne['DATEDEMANDE'];
		$Date = date('d-m-Y',strtotime($DateDemande));		
		
		//Boucle qui permet d'afficher ligne par ligne une entreprise s�l�ctionn�e
	?>
	<tbody>
	<?php
		while($ligne == TRUE){
		$ligneRelance = $ligne['NUMDEMANDE'];
		$reqNbRelance = "SELECT count(NUMDEMANDE) AS NombreRelance FROM relance WHERE NUMDEMANDE='$ligneRelance'";
		$sqlNbRelance = $connexion->query($reqNbRelance);
		$ligneNbRelance = $sqlNbRelance->fetch();
		
		$req1 = "SELECT MAX(DATERELANCE) AS derniereDate FROM relance WHERE NUMDEMANDE='$ligneRelance'";
		$sql1 = $connexion->query($req1);
		$DateRelance = $sql1->fetch();


	?>			
			<tr class="gris"><td class="gris"><?php echo $ligne['NUMDEMANDE']; ?></td>
			<td class="gris"><?php echo $ligne['NOENT']; ?></td>
			<td class="gris"><?php echo $ligne['NOETUD']; ?></td>
			<td class="gris"><?php echo $ligne['NUMETAT']; ?></td>
			<td class="gris"><?php echo $ligne['DATEDEMANDE']; ?></td>
			<td class="gris"><?php echo $ligne['NOMPERSCONTACTEE']; ?></td>
			<td class="gris"><?php echo $ligne['NUMMODE']; ?></td>
			<td class="gris"><?php echo $ligneNbRelance['NombreRelance']; ?></td>
			<td class="gris"><?php echo $DateRelance['derniereDate']; ?></td></tr>
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
