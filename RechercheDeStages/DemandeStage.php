<html>
<!--Fait par Thomas David Tous droits réservés-->
	<?php
		session_start();
		include ("../Requetes/Connexion.php");
		
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
	<form method="post" action="../Requetes/ReqDemandeStage.php" onsubmit="return verificationFonctions(this)">	
	<table class="tb1">
	<tr>
	<td>Nom de l'entreprise :</td> 
	<?php		
		//
		$sql = "SELECT NOENT, NOMENT FROM entreprise";		
		
		// Execution de la requete sql
		$requete = $connexion->query($sql);
		$ligne = $requete->fetch();
	?>
	<td><select name='lstRechercherEntreprise' class="champ">
	<?php	
	 	while($ligne == TRUE){
			$NOENT = $ligne ['NOENT'];
			$NOMENT = $ligne['NOMENT'];	
			echo"<option value='$NOENT'>$NOMENT</option>";	
			$ligne = $requete->fetch();							
		}
	?>
	
	</select>	
	</tr>
	<td>Etat de la demande :</td> 
	
	<?php
		//Préparation de la requete qui permet d'afficher les etats dans une liste déroulante
		$sql = "SELECT NUMETAT, LIBELLEETAT FROM etat";		
		
		// Execution de la requete sql
		$requete = $connexion->query($sql);
		$ligne = $requete->fetch();
		echo "<td><select name='lstRechercherEtat'>";
	
	 	while($ligne == TRUE) 
			{
			    $LIBELLEETAT = $ligne['LIBELLEETAT'];
				$NUMETAT = $ligne['NUMETAT'];
				echo"<option value='$NUMETAT'>$LIBELLEETAT</option>";	
				$ligne = $requete->fetch();							
			}
			echo"</select>";		
	?>	
	
	</td>
	</tr>
	<tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr>
	<tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr>
	<tr>
	<td>Date (JJ/MM/AA) :</td> 
	<td><input type="text" name="DateDemande" onblur="verifDateDemande(this)" value=""/></td>
	</tr>
	<tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr>
	<tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr>
	<tr>
	<td>Personne contactée :</td> 
	<td><input type="text" name="txtNom" onblur="verifSaisie(this)" value=""/></td>
	</tr>
	<td>Mode de contact :</td> 
	
	<?php		
		$sql = "SELECT NUMMODE, LIBELLEMODE FROM modecontact";		
		
		// Execution de la requete sql
			$requete = $connexion->query($sql);

			$ligne = $requete->fetch();
	?>
	
	<td><select name='lstRechercherContact'>
	
	<?php	
	 	while($ligne == TRUE){
			$LIBELLEMODE = $ligne['LIBELLEMODE'];
			$NUMMODE = $ligne['NUMMODE'];
			echo"<option value='$NUMMODE'>$LIBELLEMODE</option>";	
			$ligne = $requete->fetch();							
		}
	?>
			
	</select>		
	</option>
	</td>
	</tr>
	</table>		
	<table>
	<tr><td><input class="boutton2" type="submit" name="submit" value="Enregistrer"></td>
	</form>
	<form>
	<td><input class="boutton2" type="submit" name="submit" value="Modifier"/></td></tr>
	</form>
	<tr><td><input class="boutton2" type="submit" name="submit" value="Nouveau"/></td></tr>
	</table>
	</div>
	</form>
	</form>   
	</center>       
   </body>
</html>
