<html>
<!--Fait par Ronan Leger-->
<!--Dernieres modification : 02/12/2013 -->
	<?php	
	session_start();
	
		include ("../Requetes/Connexion.php");
		//Appel de la page d'en t�te
		include ("../Commun/EnTete.php");
	?>
	<div id="BarreSousMenu"><center>Saisir une Commune</center></div>
	
	<body>	
		<div id="corps">
			<br/>	
			<form method="post" action="../Requetes/ReqCommune.php" >	
				<table class="ajCom">						
					</tr>
					<tr>
						<td>Code postal :</td> 
						<td><input type="codePostal" name="txtCP" class="champ" required="required"/>*</td>
					</tr>
					<tr>
						<td>Nom de la ville :</td> 
						<td><input type="commune" name="txtVille" class="champ" required="required"/>*</td>
					</tr>
				</table>
				<table>
					(Champs obligatoire *)
					<td><input class="boutton2" type="submit" value="Confirmation" /></td>
					<td><input class="boutton2" type="submit" name="submit" value="saisir demande stage" onclick="self.location.href='../RechercheDeStages/AjouterDemandeStage.php'"/></td>	
			</form>
				</table>
		</div>		
   </body>
</html>