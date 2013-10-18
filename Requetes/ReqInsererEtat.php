<?php
	session_start();
	
	//Appel de la page de connexion à la base de données MySql
	include ("../Requetes/Connexion.php");
	
	//Récupération des variables de la page InsererContact.php
	$Etat = $_POST['txtEtat'];
	
	//Requêtes sql
	$req = "INSERT INTO etat (LIBELLEETAT) VALUES ('$Etat')";

	//Exécution de la requête
	$connexion->exec($req)or die(print_r($connexion->errorInfo()));

?>