<!DOCTYPE html>

<html>
<!--Fait par -->
<!--Dernieres modification : 30/09/2013 -->


	<head>
		<title>Accueil</title>
		<link rel="stylesheet"  href="../CSS/Style.css" />
	</head>
	
	<body>
		<center>
			<form class="form3" method="post" action="../Requetes/Identification.php">
				<center><h1 class="h1">Espace Connexion</h1></center><br />	
				<p>
					<label for="Identifiant">Identifiant</label>
					<input type="text" name="Identifiant"  id="Identifiant" value="" size="15"/>
				</p>
				<p>
					<label for="MotDePasse">Mot De Passe</label>
					<input type="password" name="MotDePasse" id="MotDePasse" value="" size="15"/>
				</p>   
				<center><p><input type="submit" name="submit" value="Connexion"/></p></center>	
			</form>	
		</center>       
	</body>
</html>
