	<?php 		
	
	$PseudoProf = $_SESSION['pseudoprof'];
	$PseudoEleve = $_SESSION['pseudoeleve'];
	
	if($PseudoEleve == true){
	?>
		<head>
		<title>Gestion de suivi et de recherche de stages</title>
		<link rel="stylesheet" media="screen" type="text/css" title="Stage" href="../CSS/Style.css" />
		<script type="text/javascript" src="../JavaScript/Fonction.js"></script>
		</head>	
		<body>
		<center>
		<form class="form1">    
		<img src="../images/logo.png" alt="logo du site" />   
		<div id ="cadre">  
		<div id="tete">
		Recherche de Stages
		</div>
	
		<div>
		<table class="barreMarron">
			<tr>		
				<td><label for="Accueil"><a href="../Commun/Accueil.php">Accueil</a></label></td>		
				<td><label for="SuiviStage"><a href="../RechercheDeStages/SuiviDeStages/SuiviStage.php" >Suivi des Stages</a></label></td>			
				<form id="start" action="../Requetes/Deconnexion.php" method="POST"/>
				<td><label for="Deconnexion"><a href="../Requetes/Deconnexion.php" >Deconnexion</a></label></td>		
			</tr>
		</table>
		</form>
		</div>
		
	<?php
	}else if($PseudoProf == true){
	?>
		<head>
		<title>Gestion de suivi et de recherche de stages</title>
		<link rel="stylesheet" media="screen" type="text/css" title="Stage" href="../CSS/Style.css" />
		<script type="text/javascript" src="../Javascript/fonction.js"></script>
		</head>	
		<body>
		<center>
		<form class="form1">    
		<img src="../images/logo.png" alt="logo du site" />   
		<div id ="cadre">  
		<div id="tete">
		Suivi de Stages
		</div>
	
		<div>
			<table class="barreMarron">
				<tr>		
					<td><label for="Accueil"><a href="../Commun/Accueil.php">Accueil</a></label></td>		
					<td><label label for="SuiviStage"><a href="../RechercheDeStages/SuiviDeStages/SuiviStage.php" >Suivi des Stages</a></label></td>			
					<form id="start" action="../Requetes/Deconnexion.php" method="POST">
					<td><label for="Deconnexion"><a href="../Requetes/Deconnexion.php" >Deconnexion</a></label></td>		
				</tr>
			</table>	
		</form>
		</div>
		
	<?php
	}else{
		header("location:../Commun/Index.php");
	}
	?>

		