<html>
<!--Fait par Thomas David Tous droits r�serv�s-->
	<?php
		session_start();

		//Appel de la page de connexion
		include ("../Requetes/Connexion.php");
		
		//Appel de la page d'en t�te
		include ("../Commun/EnTete.php");
	?>	
	
	<div id="BarreSousMenu"><center>Modifier une Entreprise</center></div>
	<body>	
	
	<?php
		//Appel de la page du menu de gauche
		include ("MenuGauche.php");
	?>
			
	<div id="corps">
	<br/>
	<form method="post" action="ModifierEntreprise.php">
	<center>Entreprise : 	
	
	<?php		
		//Pr�paration de la requete dans une variable
		$req = "SELECT NOMENT, NOENT
		FROM entreprise
		ORDER BY NOMENT";		
		
		// Execution de la requete sql
		$sql = $connexion->query($req);
		$ligne = $sql->fetch();	
	?>
	
	<select name='lstModifierEntreprise' class="champ">
	
	<?php			
		//Affichage dans la liste d�roulante
	 	while($ligne == TRUE){
			$NOMENT = $ligne['NOMENT'];
			$NOENT = $ligne['NOENT'];
			echo"<option value='$NOENT'>$NOMENT</option>";	
			$ligne = $sql->fetch();							
		}
	?>	
			
	</option>
	<input type="submit" name="submit" value="Modifier"/><br/><br/>
	<hr/></center>
	<br/>
	</table>
	</div>	
	</form>   
	</center>       
   </body>
</html>
