<html>
<!--Fait par Thomas David Tous droits réservés-->
	<?php
		session_start();

		//Appel de la page de connexion
		include ("../Requetes/Connexion.php");
		//Appel de la page d'en tête
		include ("../Commun/EnTete.php");
	?>	
	<div id="BarreSousMenu"><center>Relancer une demande de stage</center></div>
	<body>	
	
	<?php
		//Appel de la page du menu de gauche
		include ("MenuGauche.php");
	?>
			
	<div id="corps">
	<br/>
	<form method="post" action="AjouterRelance.php">
	<center>Entreprise : 	
	
	<?php
		
		$NumEtudiant = $_SESSION['noetud'];
		
		//Préparation de la requete dans une variable
		$req = "SELECT NOMENT, d.NOENT, NOETUD 
		FROM entreprise e, demande d WHERE e.NOENT = d.NOENT 
		AND NOETUD='$NumEtudiant'
		ORDER BY NOMENT";		
		
		// Execution de la requete sql
		$sql = $connexion->query($req);
		$ligne = $sql->fetch();	
	?>
	
	<select name='lstAjouterRelance' class="champ">
	
	<?php			
		//Affichage dans la liste déroulante
	 	while($ligne == TRUE){
			$NOMENT = $ligne['NOMENT'];
			$NOENT = $ligne['NOENT'];
			echo"<option value='$NOENT'>$NOMENT</option>";	
			$ligne = $sql->fetch();							
		}
	?>	
			
	</option>
	<input type="submit" name="submit" value="Relancer"/><br/><br/>
	<hr/></center>
	<br/>
	</table>
	</div>	
	</form>   
	</center>       
   </body>
</html>
