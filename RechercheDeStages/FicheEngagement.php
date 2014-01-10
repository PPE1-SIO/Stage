<html>
<!--Fait-->
	<?php
		session_start(); 
		include ("../Requetes/Connexion.php");
	
		//Appel de la page d'en tête
		include ("../Commun/EnTete.php");
	?>		
	<div id="BarreSousMenu"><center>Fiche d'engagement</center></div>
	<body>	
		<div id="corps">
			<form method="post" action="../Requetes/ReqFicheEngagement.php" onsubmit="return verifFonctionsDemandeStage(this)">
				<a>Nom de l'etudiant: </a>
					<?php
					$sql = "SELECT NOETUD, NOMETUD, PRENOMETUD FROM etudiant order by NOMETUD";
					$res = $connexion->query($sql);
					$ligne = $res->fetch();
					?>
					<select name="AfficheEtud" class="champ" >
					<?php
					while($ligne == TRUE){	
						echo "<option value=".$ligne['NOETUD'].">".$ligne['PRENOMETUD']." ".$ligne['NOMETUD']."</option>";
						$ligne = $res->fetch();							
					}
				?>
				</select><br/><br/>
				<a>Nom de l'entreprise : </a>
					<?php
					$sql = "SELECT NOENT, NOMENT FROM ENTREPRISE order by NOMENT";
					$res = $connexion->query($sql);
					$ligne = $res->fetch();
					?>
					<select name="AfficheEntre" class="champ" >
					<?php
					while($ligne == TRUE){	
						echo "<option value=".$ligne['NOENT'].">".$ligne['NOMENT']."</option>";
						$ligne = $res->fetch();							
					}
				?>
				</select><br/><br/>
				<a>Nom du tuteur :</a>
				<input type="text" name="txtNom" class="champ" /><br/><br/>
				<a>Nom du prof :</a>
				<select name='lstProf'>
				<?php		
				$sql = "SELECT NUMPROF, NOMPROF 
				FROM professeur
				ORDER BY NOMPROF";		
				$requete = $connexion->query($sql);
				$ligne = $requete->fetch();
				?>
				<?php
					while($ligne == TRUE){
						$NUMPROF = $ligne['NUMPROF'];
						$NOMPROF = $ligne['NOMPROF'];	
						echo"<option value='$NUMPROF'>$NOMPROF</option>";	
						$ligne = $requete->fetch();							
					}
				?>
				</select><br/><br/>
				<a>Adresse lieu du stage :</a>
				<input type="text" name="txtAdresse" class="champ" /><br/><br/>
				<a>Ville :</a>
				<input type="text" name="txtVille" class="champ" />
				<a>Code Postal :</a>
				<input type="text" name="txtCode" class="champ" /><br/><br/>
				<a>Adresse mail professionnelle :</a>
				<input type="text" name="txtMail" class="champ" /><br/><br/>
				<a>Activités proposèes :</a>
				<input type="text" name="txtAct" class="champ" size="25" /><br/><br/>
				<a>Année stage:</a>
				<input type="text" name="txtAnnee" class="champ" size="4" /><br/><br/>			
				<a>Convention Donnée</a>
				<input type="radio" name="ConventionDonnee" value="1" checked/>Oui
				<input type="radio" name="ConventionDonnee" value="0"/>Non

				<h4>Horaires hebdomadaires de présences du stagiaire dans l'entreprise :</h4>
				<table> 
					
					<tr> 
						<td></td>
						<td> Lundi </td>
						<td> Mardi</td>
						<td> Mercredi</td>
						<td> Jeudi</td>
						<td> Vendredi</td>
						<td> Samedi</td>
					</tr>
					<tr>
						<td> Matin </td>
						<td><input type="text" name="LundiMat" class="champ" size="8" /></td>
						<td><input type="text" name="MardiMat" class="champ" size="8" /></td>
						<td><input type="text" name="MercrediMat" class="champ" size="8" /></td>
						<td><input type="text" name="JeudiMat" class="champ" size="8" /></td>
						<td><input type="text" name="VendrediMat" class="champ" size="8" /></td>
						<td><input type="text" name="SamediMat" class="champ" size="8" /></td>
						
					</tr>
					<tr>
						<td> Aprém </td>
						<td><input type="text" name="LundiAprem" class="champ" size="8" /></td>
						<td><input type="text" name="MardiAprem" class="champ" size="8" /></td>
						<td><input type="text" name="MercrediAprem" class="champ" size="8" /></td>
						<td><input type="text" name="JeudiAprem" class="champ" size="8" /></td>
						<td><input type="text" name="VendrediAprem" class="champ" size="8" /></td>
						<td><input type="text" name="SamediAprem" class="champ" size="8" /></td>
					<tr>
				</table><br/>
				<input class="boutton2" type="submit" name="submit" value="valider">
			</form>
		</div>
	</body>
</html>