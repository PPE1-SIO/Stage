<?php
//Fait par Thomas David Tous droits réservés
	session_start();
	$_SESSION = array();
	session_destroy();
	header ('Location:../Commun/Index.php');
?>
