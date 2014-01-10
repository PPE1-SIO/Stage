<html>
<!--Fait par Pierrick Chevessier-->
<!--Dernieres modification : 02/12/2013 -->
<?php
	//Pierrick
	session_start();
	include ("Connexion.php");
	$NumEtudiant = $_POST['AfficheEtud'];
	$NumEntreprise = $_POST['AfficheEntre'];
	$NomTuteur = $_POST['txtNom'];
	$NomProf = $_POST['lstProf'];
	$Adresse = $_POST['txtAdresse'];
	$Activite = $_POST['txtAct'];	
?>
</html>