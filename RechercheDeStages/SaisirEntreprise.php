<html>
<!--Fait par Ronan Leger-->
<!--Dernieres modification : 02/12/2013 -->
	<?php	
	session_start();
	
		include ("../Requetes/Connexion.php");
		//Appel de la page d'en t�te
		include ("../Commun/EnTete.php");
	?>
	<div id="BarreSousMenu"><center>Saisir une Entreprise</center></div>
	
	<script type="text/javascript">

		// reçoit l'url de la page à exécuter et le code postal pour la requête à exécuter
		function envoyerRequete(url,Com_CodePostal)	
		{
			var xhr = new XMLHttpRequest();	// création de l'objet XMLHttpRequest

			xhr.open("POST", url, true);	// ouverture de la requête http
			xhr.onreadystatechange = function() {	// à chaque changement d'état
			
				if (xhr.readyState == 4 && xhr.status == 200) {		// vérifier l'état et si tout s'est correctement déroulé
					//accède à l'élément nbCom de la page HTML par son id (méthode getElementById) et en modifie le HTML (propriété innerHTML)
					traiterReponse(xhr.responseText); 
				}
			};
			xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");	// changement du type MIME de la requête car méthode POST utilisée
			xhr.send("cp=" + Com_CodePostal);	// envoi de la requête et du paramètre
		}
		function traiterReponse(reponse)
		{
			var nbCom,listeCom;
			var TabCommune=reponse.split('/'); // découper la réponse en utilisant le caractère inséré entre chaque produit dans la page getProduits.php
			nbCom=TabCommune.length;				// déterminer le nombre de produits du tableau TabCommune
			
			listeCommune=document.getElementById("listeCommune");	// récupérer l'objet d'id listeCom de la page html
			listeCommune.length=nbCom;					// le nombre d'items de la liste est maintenant celle de TabCommune
			
			listeCommune.size=nbCom;		

			for (var i=0; i<nbCom; i++)
			{
				var id = TabCommune[i].split('*');
				listeCommune.options[i].text=id[0];	// ajouter les produits à la liste
				listeCommune.options[i].value=id[1];
			}
		}
	</script>
	
	<body>	
		<div id="corps">
			<br/>	
			<form method="post" action="../Requetes/ReqEntreprise.php" >	
				<table class="tb1">	
					<tr>
						<td>Nom de l'entreprise :</td>
						<td><input type="text" name="txtNom" class="champ" required="required"/>*</td>
					</tr>
					<tr>
						<td>Representant :</td>
						<td><input type="text" name="txtRepEnt" class="champ" required="required"/>*</td>
					</tr>
					<tr>
						<td>Qualite du representant :</td>
						<td><input type="text" name="txtQR" class="champ" required="required"/>*</td>
					</tr>
					<tr>
						<td>Adresse :</td>
						<td><input type="text" name="txtAd" class="champ" required="required"/>*</td>
					</tr>
					<tr>
						<td>Code postal :</td>
						<td>
						<?php
							//Preparation de la requete qui permet d'afficher le Code postale des Communes de la region Centre
							$sql = "SELECT DISTINCT Com_CodePostal
							FROM commune
							ORDER BY Com_CodePostal";
							
							// Execution de la requete sql
							$requete = $connexion->query($sql);
							$ligne = $requete->fetch();
						?>
						<select name='txtCP' class="champ" onchange="envoyerRequete('getNomCommune.php',this.value)">
							<?php
								//Affichage
								echo "<option></option>";
								while($ligne == TRUE){
									$Com_CodePostal = $ligne['Com_CodePostal'];
									echo"<option value='$Com_CodePostal'>$Com_CodePostal</option>";
									$ligne = $requete->fetch();
								}
							?>	
						</select>*
						</td>
						<td>Si votre commune ne se trouve pas dans la liste :</td>
					</tr>
					<tr>
						<td>Ville :</td>
						<td>						
							<select id="listeCommune" name='txtVille' class="champ"></select>*
						</td>
						<td><input class="btn" value="Ajouter une commune" onclick="self.location.href='../RechercheDeStages/AjouterCommune.php'" /></td>						
					</tr>
					<tr>
						<td>Telephone :</td> 
						<td><input type="tel" name="txtTel" class="champ" required="required"/>*</td>
					</tr>
					<tr>
						<td>Activite de l'entreprise :</td>
						<td><textarea rows="4" cols="40" name="txtActE" class="champ"></textarea></td>
					</tr>
				</table>
				<table>
					(Champs obligatoire *)
					<td><input class="boutton2" type="submit" value="Confirmation" /></td>
					<td><input class="btn" name="submit" value="saisir demande stage" onclick="self.location.href='../RechercheDeStages/AjouterDemandeStage.php'"/></td>	
			</form>
				</table>
		</div>		
    </body>
</html>