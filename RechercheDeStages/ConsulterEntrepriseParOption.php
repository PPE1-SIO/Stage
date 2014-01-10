<html>
<!--Fait par Nicolas Rivault-->
<!--Dernieres modification : 30/09/2013 -->
	<?php
		session_start();
		
		include ("../Requetes/Connexion.php");
		
		//Appel de la page d'en tête
		include ("../Commun/EnTete.php");
	?>	
	
	<div id="BarreSousMenu"><center>Consultation des Entreprises par Option</center></div>
	<body>	
			
	<div id="corps">
	<br/>		
	<form method="post" action="AffichageEntrepriseParOption.php" name="form">
	<center><table><tr><td>Quelle est votre option ?</td></tr>
	
	<td><INPUT type="radio" value="SLAM" class="champ" name="optEntrepriseContactee" checked="checked">SLAM</td></tr>

	<td><INPUT type="radio" value="SISR" class="champ" name="optEntrepriseContactee">SISR</td></tr>
	</table>
	<input type="submit" name="submit" value="Rechercher"/><br/><br/>	
	</form>	
	</center>
	<br/>
	</table>
	</div>	
	</form>   
	</center>       
   </body>
</html>
