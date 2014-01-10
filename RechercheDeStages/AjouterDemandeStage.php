<html>
<!--Fait par Nicolas Rivault,Ronan Leger-->
<!--Dernieres modification : 02/12/2013 -->
	<?php		
		session_start();

		//Appel de la page connexion.php
		include ("../Requetes/Connexion.php");	

		//Appel de la page d'en t�te
		include ("../Commun/EnTete.php");
	?>
	<div id="BarreSousMenu"><center>Ajouter une Demande de Stage</center></div>
	<body>		
		
	<div id="corps">
	<br/>
	<form method="post" action="../Requetes/ReqDemandeStage.php" onsubmit="return verifFonctionsDemandeStage(this)">	
	<table class="tb1">
	<tr>
	<td>Nom de l'entreprise :</td>
	<?php		
		//Pr�paration de la requ�te qui permet d'afficher le nom des entreprises
		$sql = "SELECT NOENT, NOMENT 
		FROM entreprise
		ORDER BY NOMENT";		
		
		// Execution de la requete sql
		$requete = $connexion->query($sql);
		$ligne = $requete->fetch();
	?>
	<select name='lstRechercherEntreprise' class="champ" required="required">
	<?php
		//Affichage
	 	while($ligne == TRUE){
			$NOENT = $ligne['NOENT'];
			$NOMENT = $ligne['NOMENT'];	
			echo"<option value='$NOENT'>$NOMENT</option>";	
			$ligne = $requete->fetch();							
		}
	?>
	
	</select>*	
	</tr>
	<tr>
	<td>Date (JJ-MM-AAAA) :</td> 
	<td><input type="text" name="DateDemande" class="champ" required="required" />*</td>
	</tr>
	<tr>
	<td>Personne contactée :</td> 
	<td><input type="text" name="txtNom" class="champ" required="required"/>*</td>
	</tr>
	<td>Mode de contact :</td> 
	
	<?php
		//Pr�paration de la requete pour afficher dans une liste d�roulante les modes de contact
		$sql = "SELECT NUMMODE, LIBELLEMODE FROM modecontact";		
		
		// Execution de la requete sql
		$requete = $connexion->query($sql);
		$ligne = $requete->fetch();
	?>
	
	<td><select name='lstRechercherContact' class="champ" required="required"/>
	
	<?php
		//Affichage dans la liste d�roulante
	 	while($ligne == TRUE){
			$LIBELLEMODE = $ligne['LIBELLEMODE'];
			$NUMMODE = $ligne['NUMMODE'];
			echo"<option value='$NUMMODE'>$LIBELLEMODE</option>";
			$ligne = $requete->fetch();							
		}
	?>
			
	</select>*
	</option>
	</td>
        <td><FONT size="2pt">* Champs obligatoires</FONT></td>
	</table>		
	<table>
	<tr><td><input class="boutton2" type="submit" name="submit" value="Enregistrer"></td>
	</form>	
	<table>	
		<td>
		<form method="post" action="../Requetes/ReqInsererContact.php" >
			<td>autre mode de contact :<input type="text" name="txtNom" class="champ" />*</td>
		</form>	
	</table>
	</td>	
	<td><input class="boutton2" type="submit" name="submit" value="Nouvelle entreprise" onclick="self.location.href='../RechercheDeStages/SaisirEntreprise.php'"/></td>
	</table>
	
	</div>	   
	</center>       
   </body>
</html>