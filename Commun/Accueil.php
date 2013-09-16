<html>
<!--Fait par Thomas David Tous droits r�serv�s-->

	<head>
		<title>Gestion de suivi et de recherche de stages</title>
		<link rel="stylesheet" media="screen" type="text/css" title="Stage" href="../CSS/Style.css" />
	</head>	
	<body>
	<center>
	<form class="form1">    
	<img src="../images/logo.png" alt="logo du site" />   
	<div id ="cadre">  
	<div id="tete">
	Accueil
	</div>
	
<?php
	session_start();
	include ("../Requetes/Connexion.php");
	
	$PseudoProf = $_SESSION['pseudoprof'];
	$PseudoEleve = $_SESSION['pseudoeleve'];
	

	
	if($PseudoEleve == true){
?>
	
	<div>
	<table class="barreMarron">
	<tr>		
	<td><label for="Accueil"><a href="../Commun/Accueil.php">Accueil</a></label></td>		
	<td><label for="RechercheStages"><a href="../RechercheDeStages/RechercheStages.php" >Recherche de Stages</a></label></td>			
	<form id="start" action="../Requetes/Deconnexion.php" method="POST">
	<td><label for="Deconnexion"><a href="../Requetes/Deconnexion.php" >Deconnexion</a></label></td>		
	</tr>
	</table>	
	</form>
	</div>							
	<div id="corps">
	</br>
	<center>
	Bienvenue sur le site de la gestion du suivi des stages,
	vous trouverez plusieurs formulaires concernants les �tudiants, les entreprises,
	les stages et les activit�s professionnelles.
	</center>
	</div>
<?php
	}else if($PseudoProf == true){
?>
		<div>
	<table class="barreMarron">
	<tr>		
	<td><label for="Accueil"><a href="../Commun/Accueil.php">Accueil</a></label></td>		
	<td><label for="RechercheStages"><a href="../RechercheDeStages/RechercheStages.php" >Recherche de Stages</a></label></td>		
	<td><label for="SuiviStage"><a href="../SuiviDeStages/SuiviStage.php" >Suivi des Stages</a></label></td>			
	<form id="start" action="../Requetes/Deconnexion.php" method="POST">
	<td><label for="Deconnexion"><a href="../Requetes/Deconnexion.php" >Deconnexion</a></label></td>		
	</tr>
	</table>	
	</form>
	</div>							
	<div id="corps">
	</br>
	<center>
	Bienvenue sur le site de la gestion du suivi des stages,
	vous trouverez plusieurs formulaires concernants les �tudiants, les entreprises,
	les stages et les activit�s professionnelles.
	</center>
	</div>
<?php
	}else{
		header("location:../Commun/Index.php");
	}
?>
	</div>	
	</form>   
	</center>       
   </body>
</html>
