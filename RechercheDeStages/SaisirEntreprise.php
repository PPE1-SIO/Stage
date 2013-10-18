<html>

	<?php	
	session_start();
	
		include ("../Requetes/Connexion.php");
		//Appel de la page d'en t�te
		include ("../Commun/EnTete.php");
	?>
	
	<div id="BarreSousMenu"><center>Saisir une Entreprise</center></div>
	<body>	

	
	<div id="corps">
	<br/>	
	<form method="post" action="../Requetes/ReqEntreprise.php" onclick="self.location.href='../RechercheDeStages/SaisirEntreprise.php'">	
	<table class="tb1">	
	<tr>
	<td>Nom de l'entreprise :</td> 
	<td><input type="text" name="txtNom" class="champ" required="required"/>*</td>
	</tr>
	<tr>
	<td>Representant :</td> 
	<td><input type="text" name="txtRepEnt" class="champ" required="required"/>*</td>
	</tr>
	<tr>
	<td>Qualite du representant :</td> 
	<td><input type="text" name="txtQR" class="champ" required="required"/>*</td>
	</tr>
	<tr>
	<td>Adresse :</td> 
	<td><input type="text" name="txtAd" class="champ" required="required"/>*</td>
	</tr>
	<tr>
	<td>Code postal :</td> 
	<td>
	<?php		
		//Preparation de la requete qui permet d'afficher le Code postale des Communes de la region Centre
		$sql = "SELECT DISTINCT Com_CodePostal
		FROM commune
		ORDER BY Com_CodePostal";
		
		// Execution de la requete sql
		$requete = $connexion->query($sql);
		$ligne = $requete->fetch();
	?>
	<select name='lstCPCommune' class="champ" required="required">
	<?php
		//Affichage
	 	while($ligne == TRUE){
			$Com_ID = $ligne['Com_ID'];
			$Com_CodePostal = $ligne['Com_CodePostal'];
			echo"<option value='$Com_ID'>$Com_CodePostal</option>";
			$ligne = $requete->fetch();
		}
	?>	
	</select>*
	</td>
	</tr>
	<tr>
	<td>Ville :</td> 
	<td>
	<?php		
		//Preparation de la requete qui permet d'afficher le Nom des Villes de la region Centre
		$sql2 = "SELECT DISTINCT Com_Nom
		FROM commune
		ORDER BY Com_Nom";
		
		// Execution de la requete sql
		$requete2 = $connexion->query($sql2);
		$ligne2 = $requete2->fetch();
	?>
	<select name='lstCPCommune' class="champ" required="required">
	<?php
		//Affichage
	 	while($ligne2 == TRUE){
			$Com_ID = $ligne2['Com_ID'];
			$Com_Nom = $ligne2['Com_Nom'];
			echo"<option value='$Com_ID'>$Com_Nom</option>";
			$ligne2 = $requete2->fetch();
		}
	?>	
	</select>*
	</td>
	</tr>
	<tr>
	<td>Telephone :</td> 
	<td><input type="tel" name="txtTel" class="champ" required="required"/>*</td>
	</tr>
	<tr>
	<td>Activite de l'entreprise :</td> 
	<td><textarea rows="4" cols="40" name="txtActE" class="champ"></textarea></td>
	</tr>
	</table>	
	<table>	
	<td><input class="boutton2" type="submit" value="Confirmation" /></td>
	</form>
	</table>
	</div> 

	</center> 
	<input class="boutton2" type="submit" name="submit" value="saisir demande stage" onclick="self.location.href='../RechercheDeStages/AjouterDemandeStage.php'"/>	
    </body>
</html>
