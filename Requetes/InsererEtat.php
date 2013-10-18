<html>
<!--Pierrick 23/09/13-->
	<?php
		session_start();
		
		include ("../Requetes/Connexion.php");
		
		//Appel de la page d'en t�te
		include ("../Commun/EnTete.php");
	?>	
	
	<div id="BarreSousMenu"><center>Inserer un nouvel etat</center></div>
	<body>	
		<div id="corps"><br/>
			<form method="post" action="../Requetes/ReqInsererEtat.php">
				Etat :
				<input type="text" name="txtEtat" class="champ" onblur="verifSaisie(this)"/>*<br/>
				<FONT size="2pt">* Champs obligatoires</FONT>	
				<input class="boutton2" type="submit" name="submit" value="Enregistrer">				
			</form>				
			<form method="post" action="InsererEtat.php">				
				<input class="boutton2" type="submit" name="submit" value="Nouveau"/>
			</form>
		</div>	      
   </body>
</html>