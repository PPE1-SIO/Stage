<html>	
<!--Fait par Thomas David Tous droits r�serv�s-->
	<?php
		session_start();
		
		//Appel de la page connexion.php
		include ("../Requetes/Connexion.php");	
	?>
	
	<?php	
		//Appel de la page d'en t�te
		include ("../Commun/EnTete.php");
	?>	
	
	<body>	
	
	<?php
		//Appel de la page du menu de gauche
		include ("MenuGauche.php");
	?>
			
	<div id="corps">
	<br/>
	L'enregistrement de votre demande a �t� correctement enregistr�e.<br/><br/>
	</div>	
	</center>       
	</body>
</html>
