<html>
<!--Fait par Thomas David Tous droits r�serv�s-->
	<?php
		session_start();
		
		include ("../Requetes/Connexion.php");
		
		//Appel de la page d'en t�te
		include ("../Commun/EnTete.php");
	?>	
	
	<div id="BarreSousMenu"><center>Inserer un Mode de Contact</center></div>
	<body>	


	<div id="corps">
	<br/>
	<form method="post" action="../Requetes/ReqInsererContact.php" onsubmit="return verifFonctionsInsererContact(this)">
	<table>
	<tr>
	<td>Mode de Contact :</td> 
	<td><input type="text" name="txtNom" class="champ" onblur="verifSaisie(this)"/>*</td>
	</tr>
        <td><FONT size="2pt">* Champs obligatoires</FONT></td>
	<tr><td><input class="boutton2" type="submit" name="submit" value="Enregistrer"></td>
	</form>	
	<form method="post" action="InsererContact.php">
	<td><input class="boutton2" type="submit" name="submit" value="Nouveau"/></td></tr>
	</table>
	</form>
	</div>	      
   </body>
</html>
