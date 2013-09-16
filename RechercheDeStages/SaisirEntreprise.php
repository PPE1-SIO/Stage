<html>

	<?php	
	session_start();
	
		include ("../Requetes/Connexion.php");
		//Appel de la page d'en t�te
		include ("../Commun/EnTete.php");
	?>
	
	<div id="BarreSousMenu"><center>Saisir une Entreprise</center></div>
	<body>	
	
	<?php
		//Appel de la page du menu de gauche
		include ("MenuGauche.php");		

	?>
	
	<div id="corps">
	<br/>	
	<form method="post" action="../Requetes/ReqEntreprise.php" onsubmit="return verifFonctionsSaisirEntreprise(this)">	
	<table class="tb1">	
	<tr>
	<td>Nom de l'entreprise :</td> 
	<td><input type="text" name="txtNom" class="champ" onblur="verifNomEnt(this)"/>*</td>
	</tr>
	<tr>
	<td>Representant :</td> 
	<td><input type="text" name="txtRepEnt" class="champ" onblur="verifSaisie(this)"/>*</td>
	</tr>
	<tr>
	<td>Qualite du representant :</td> 
	<td><input type="text" name="txtQR" class="champ" onblur="verifSaisie(this)"/>*</td>
	</tr>
	<tr>
	<td>Adresse :</td> 
	<td><input type="text" name="txtAd" class="champ" onblur="verifAdr(this)"/>*</td>
	</tr>
	<tr>
	<td>Code postal :</td> 
	<td><input type="text" name="txtCP" class="champ" onblur="verifCP(this)"/>*</td>
	</tr>
	<tr>
	<td>Ville :</td> 
	<td><input type="text" name="txtVille" class="champ" onblur="verifSaisie(this)"/>*</td>
	</tr>
	<tr>
	<td>Telephone :</td> 
	<td><input type="tel" name="txtTel" class="champ" onblur="verifTel(this)"/>*</td>
	</tr>
	<tr>
	<td>Activite de l'entreprise :</td> 
	<td><textarea rows="4" cols="40" name="txtActE" class="champ"></textarea></td>
	</tr>
	</table>	
	<table>	
	<tr><td><input class="boutton2" type="submit" value="Confirmation"></td>
	</form>
	<form method="post" action="../RechercheDeStages/Entreprise.php">
	<td><input class="boutton2" type="submit" name="submit" action="SaisirEntreprise.php" value="Nouveau"/></td>
	<td><input class="boutton2" type="submit" name="submit" action="Entreprise.php" value="Modifier"/></td></tr>
        <tr><FONT size="2pt">* Champs obligatoires</FONT></tr>
	</form>
	</table>
	</div>
	</div>
	</form>   
	</center>       
    </body>
</html>
