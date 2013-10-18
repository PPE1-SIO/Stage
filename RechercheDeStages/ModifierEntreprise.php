<!--RAMADANI Arbër 18/06/2012-->
<html>

	<?php
		session_start();
	
		//ouverture du php et recupération des variables 
	
		include ("../Requetes/connexion.php");

		include("../Commun/EnTete.php"); ?><!--Inclure l'entête de la page-->

	<?php include("../RechercheDeStages/MenuGauche.php"); ?><!--Inclure le menu gauche de la page-->
	

<div id="corps"></br></br>

<!-- création du formulaire et vérification de la saisie correcte des données à l'aide de javascript -->

<form method="post" action="../Requetes/ReqModificationEntreprise.php" onsubmit="return verifFonctionsSaisirEntreprise(this);">

	<?php
	
		
		$_SESSION['NoEntr'] = $_POST['lstModifierEntreprise'];
		$NoEntreprise = $_SESSION['NoEntr'];
		
		
		$req = "SELECT * FROM entreprise Where NOENT = $NoEntreprise";
		
		$tableau = $connexion->query($req);
		$donnees = $tableau->fetch();

	?>
<label For="nomE">Nom de l'entreprise : </label>
	<input type="text" name="txtNom" onblur="verifNomEnt(this)" value="<?php echo $donnees['NOMENT']; ?>"/><FONT size="2">*</FONT></br>
<label for="rpz">Représentant de l'entreprise : </label>
	<input type="text" name="txtRepEnt" onblur="verifSaisie(this)" value="<?php echo $donnees['REPENT']; ?>"/><FONT size="2">*</FONT></br>
<label for="qr">Qualité du représentant : </label>
	<input type="text" name="txtQR" onblur="verifSaisie(this)" value="<?php echo $donnees['QUALITEREP']; ?>"/><FONT size="2">*</FONT></br>
<label for="adE">Adresse de l'entreprise : </label>
	<input type="text" name="txtAd" onblur="verifAdr(this)" value="<?php echo $donnees['ADRUEENT']; ?>"/><FONT size="2">*</FONT></br>
<label for="cpE">Code postal de l'entreprise : </label>
	<input type="text" name="txtCP" onblur="verifCP(this)" value="<?php echo $donnees['CPENT']; ?>"/><FONT size="2">*</FONT></br>
<label for="villeE">Ville de l'entrprise : </label>
	<input type="text" name="txtVille" onblur="verifSaisie(this)" value="<?php echo $donnees['VILLEENT']; ?>"/><FONT size="2">*</FONT></br>
<label for="telE">Téléphone de l'entreprise : </label>
	<input type="text" name="txtTel" onblur="verifTel(this)" value="<?php echo $donnees['TELENT']; ?>"/><FONT size="2">*</FONT></br></br>
<label>Activiter de l'entreprise : </label></br>
	<textarea rows="6" cols="40" name="txtActE"><?php echo $donnees['ACTENT']; ?></textarea></br></br>
<FONT size="1">*champ obligatoire</FONT></BR></br>

<input type="submit" value="Modifier"/>
<input type="hidden" name="txtNoEnt" value="<?php echo $donnees['NOENT']; ?>"/>
</form>
<form action="Entreprise.php">
<input type="submit" value="Retour"/>
</form>
</div>
</div>
</form>   
</center>   
</body>
</html>
