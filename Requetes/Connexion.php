<?php

/* Connexion � la base de donn�e */
$hote = 'localhost';
$port = '';
$dbname = 'gestionsuivistage';
$utilisateur = 'root';
$mdp = '';


try 
{
	$connexion = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$dbname, $utilisateur, $mdp);
} catch (Exception $e) 
{
	echo "L'utilisateur et/ou le mot de passe sont incorrects";
	die();
}
?>