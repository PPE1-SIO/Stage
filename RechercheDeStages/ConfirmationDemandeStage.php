<html>	
<!--Fait par Thomas David Tous droits réservés-->
	<?php
		session_start();
		
		//Appel de la page connexion.php
		include ("../Requetes/Connexion.php");	
	?>
	
	<?php	
		//Appel de la page d'en tête
		include ("../Commun/EnTete.php");
	?>	
	
	<body>	
	
	<?php
		//Appel de la page du menu de gauche
		include ("MenuGauche.php");
	?>
			
	<div id="corps">
	<br/>
	L'enregistrement de votre demande a été correctement enregistrée.<br/><br/>
	</div>	
	</center>       
	</body>
</html>
