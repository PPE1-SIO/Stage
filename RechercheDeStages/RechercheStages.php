<html>
<!--Fait par Thomas David Tous droits r�serv�s-->
	<?php
		session_start();
		include ("../Requetes/Connexion.php");
		
		//Appel de la page d'en t�te
		include ("../Commun/EnTete.php");
	?>
	
	
	<body>	
	
	<?php
		//Appel de la page du menu de gauche
		include ("MenuGauche.php");
	?>
	
	<div id="corps">
	</br>
	Cette section va vous permettre de pouvoir saisir ou modifier une demande de stage,
	saisir une entreprise ainsi que l'etat de la demande, mais aussi le mode de contact.</br></br>
	Vous pourrez egalement consulter :</br></br>
	<li> les entreprises qui accueillent des stagiaires pour chaque option.</li></br>
	<li> les entreprises deja contactees par les etudiants d'une meme promotion.</li></br>
	<li> les etapes de recherche de stage pour un etudiant donne.</li>
        <li> La liste en format PDF de l'ensemble des demandes de stage realise par l'etudiant.</li>
	</div>	
	</div> 
	</form>
	</center>       
	</body>
</html>
