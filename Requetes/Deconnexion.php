<?php
//Fait par Thomas David Tous droits r�serv�s
	session_start();
	$_SESSION = array();
	session_destroy();
	header ('Location:../Commun/Index.php');
?>
