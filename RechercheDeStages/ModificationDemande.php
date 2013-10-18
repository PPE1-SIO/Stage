<html>
<!--Ronan Leger-->
	<?php		
		session_start();

		//Appel de la page connexion.php
		include ("../Requetes/Connexion.php");	
	
		//Appel de la page d'en t�te
		include ("../Commun/EnTete.php");
	?>
	<div id="BarreSousMenu"><center>Modifier une Demande de Stage</center></div>
	<body>
		<div id="corps">
			<br/>
			<form method="post" action="../Requetes/ReqModificationDemande.php" onsubmit="return verifFonctionsDemandeStage(this)">	
				<table class="tb1">
					<tr>
						<td>Nom de l'entreprise : </td>					
							<?php
								//Pr�paration de la requete qui permet d'afficher le nom des entreprise des demande de stage dans une liste d�roulante
								$sql = "SELECT NOMENT FROM entreprise INNER JOIN demande ON demande.NOENT = entreprise.NOENT ";		
								
								// Execution de la requete sql
								$requete = $connexion->query($sql);
								$ligne = $requete->fetch();
							?>					
						<td>
							<select name='IDStage' class="champ">						
								<?php
									//Affichage
									while($ligne == TRUE) 
									{										
										$NOMENT = $ligne['NOMENT'];
										echo"<option value='$NOMENT'>$NOMENT</option>";	
										$ligne = $requete->fetch();							
									}		
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Etat de la demande :</td>					
							<?php
								//Pr�paration de la requete qui permet d'afficher les etats dans une liste d�roulante
								$sql = "SELECT NUMETAT, LIBELLEETAT FROM etat";		
								
								// Execution de la requete sql
								$requete = $connexion->query($sql);
								$ligne = $requete->fetch();
							?>					
						<td>
							<select name='lstRechercherEtat' class="champ">						
								<?php
									//Affichage
									while($ligne == TRUE) 
									{
										$LIBELLEETAT = $ligne['LIBELLEETAT'];
										$NUMETAT = $ligne['NUMETAT'];
										echo"<option value='$NUMETAT'>$LIBELLEETAT</option>";	
										$ligne = $requete->fetch();							
									}
								?>	
							</select>
						</td>
					</tr>
					<tr>
						<td>Date (JJ-MM-AAAA) :</td> 
						<td><input type="text" name="DateDemande" class="champ" onblur="verifDateDemande(this)" value=""/></td>
					</tr>
					<tr>
						<td>Personne contact�e :</td> 
						<td><input type="text" name="txtNom" class="champ" onblur="verifSaisie(this)" value=""/></td>
					</tr>
					<td>Mode de contact :</td>				
					<?php
						//Pr�paration de la requete pour afficher dans une liste d�roulante les modes de contact
						$sql = "SELECT NUMMODE, LIBELLEMODE FROM modecontact";		
						
						// Execution de la requete sql
						$requete = $connexion->query($sql);
						$ligne = $requete->fetch();
					?>				
					<td>
						<select name='lstRechercherContact' class="champ">				
							<?php
								//Affichage dans la liste d�roulante
								while($ligne == TRUE){
									$LIBELLEMODE = $ligne['LIBELLEMODE'];
									$NUMMODE = $ligne['NUMMODE'];
									echo"<option value='$NUMMODE'>$LIBELLEMODE</option>";
									$ligne = $requete->fetch();							
								}
								
								$_SESSION['noentrep'] = $_POST['lstModifierDemande'];
							?>						
						</select>	
					</td>
				</table>		
				<table>
					<tr>
						<td>
							<input class="boutton2" type="submit" name="submit" value="Enregistrer">
						</td>
			</form>	
			<form method="post" action="AjouterDemandeStage.php">
						<td>
							<input class="boutton2" type="submit" name="submit" value="Nouveau"/>
						</td>
					</tr>
			</form>
				</table>	
		</div>  
    </body>
</html>