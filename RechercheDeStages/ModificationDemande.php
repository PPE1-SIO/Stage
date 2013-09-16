<html>
<!--Fait par Thomas David Tous droits réservés-->
	<?php		
		session_start();

		//Appel de la page connexion.php
		include ("../Requetes/Connexion.php");	
	
		//Appel de la page d'en tête
		include ("../Commun/EnTete.php");
	?>
	<div id="BarreSousMenu"><center>Modifier une Demande de Stage</center></div>
	<body>	
	
	<?php
		//Appel de la page du menu de gauche
		include ("MenuGauche.php");
		
		$NoEnt = $_POST['lstModifierDemande'];
		$reqRecupNomEnt = "SELECT NOMENT FROM entreprise WHERE NOENT='$NoEnt'";
		$sqlRecupNomEnt = $connexion->query($reqRecupNomEnt);
		$ligneRecup = $sqlRecupNomEnt->fetch();
	?>		

	<div id="corps">
	<br/>
	<form method="post" action="../Requetes/ReqModificationDemande.php" onsubmit="return verifFonctionsDemandeStage(this)">	
	<table class="tb1">
	<tr><td>Nom de l'entreprise : </td><td><?php echo $ligneRecup['NOMENT']; ?></td></tr>
	<tr>
	<td>Etat de la demande :</td> 
	
	<?php
		//Préparation de la requete qui permet d'afficher les etats dans une liste déroulante
		$sql = "SELECT NUMETAT, LIBELLEETAT FROM etat";		
		
		// Execution de la requete sql
		$requete = $connexion->query($sql);
		$ligne = $requete->fetch();
	?>
	
	<td><select name='lstRechercherEtat' class="champ">
	
	<?php
		//Affichage
	 	while($ligne == TRUE) 
			{
			    $LIBELLEETAT = $ligne['LIBELLEETAT'];
				$NUMETAT = $ligne['NUMETAT'];
				echo"<option value='$NUMETAT'>$LIBELLEETAT</option>";	
				$ligne = $requete->fetch();							
			}
			echo"</select>";		
	?>	
	
	</select>
	</td>
	</tr>
	<tr>
	<td>Date (JJ-MM-AA) :</td> 
	<td><input type="text" name="DateDemande" class="champ" onblur="verifDateDemande(this)" value=""/>*</td>
	</tr>
	<tr>
	<td>Personne contactée :</td> 
	<td><input type="text" name="txtNom" class="champ" onblur="verifSaisie(this)" value=""/>*</td>
	</tr>
	<td>Mode de contact :</td> 
	
	<?php
		//Préparation de la requete pour afficher dans une liste déroulante les modes de contact
		$sql = "SELECT NUMMODE, LIBELLEMODE FROM modecontact";		
		
		// Execution de la requete sql
		$requete = $connexion->query($sql);
		$ligne = $requete->fetch();
	?>
	
	<td><select name='lstRechercherContact' class="champ">
	
	<?php
		//Affichage dans la liste déroulante
	 	while($ligne == TRUE){
			$LIBELLEMODE = $ligne['LIBELLEMODE'];
			$NUMMODE = $ligne['NUMMODE'];
			echo"<option value='$NUMMODE'>$LIBELLEMODE</option>";
			$ligne = $requete->fetch();							
		}
		
		$_SESSION['noentrep'] = $_POST['lstModifierDemande'];
	?>
			
	</select>		
	</option>
	</td>
	</tr>
	</table>		
	<table>
	<tr><td><input class="boutton2" type="submit" name="submit" value="Enregistrer"></td>
	</form>	
	<form method="post" action="AjouterDemandeStage.php">
	<td><input class="boutton2" type="submit" name="submit" value="Nouveau"/></td></tr>
	</form>
	</table>	
	</div>	   
	</center>       
   </body>
</html>