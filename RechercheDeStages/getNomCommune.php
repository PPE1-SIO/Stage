<?php
	header("Cache-Control: no-cache, must-revalidate");
	header('Content-Type: text/plain; charset=ISO-8859-1');	
	include ("../Requetes/Connexion.php");
	$cp = $_POST['cp'];
	$req = $connexion->query("select Com_Nom, Com_ID from commune where Com_CodePostal = '$cp'");
	
		
	if ($nom=$req->fetch())	// le premier produit trouvé est traité independement des autres car il ne faut pas lui ajouter le car. /
	{
		$resultat=$nom['Com_Nom'];
		$resultat=$resultat.'*'.$nom['Com_Nom'];
	}
	else
	{
		$resultat='';		// dans ce cas il n'y a pas de produit donc on retournera une chaîne vide
	}
	
	while($nom=$req->fetch())	// tant qu'il reste des commune
	{
		$resultat=$resultat.'/'.$nom['Com_Nom'];
		$resultat=$resultat.'*'.$nom['Com_Nom'];
	}
	
	echo $resultat;	
?>