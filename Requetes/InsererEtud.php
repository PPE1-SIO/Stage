<!--RAMADANI Arb�r 10/06/2012-->

<?php
include('../Requetes/Connexion.php');//ouverture de la connexion

//recup�ration des variables 

$nom = $_POST['txtNom'];
$prenom = $_POST['txtPrenom'];
$dn = $_POST['txtDn'];
$Date = date('Y-m-d',strtotime($dn)); //mise en forme pour ins�rer dans mySQL
$ad = $_POST['txtAd'];
$cp = $_POST['txtCP'];
$ville = $_POST['txtVille'];
$tel = $_POST['txtTel'];
$mail = $_POST['txtMail'];
$opt = $_POST['optSio'];
$mp = $_POST['txtMp'];
$annee = $_POST['optAnnee'];
$prom = $_POST['txtProm'];

//requ�te d'insertion d'etudiant dans la base de donn�es 

$req="INSERT INTO etudiant(NOMETUD, PRENOMETUD, DATENAISS, ADRUEETUD, CPETUD, VILLEETUD, TELETUD, MELETUD, FORMATION, MOTPASSE, ANNEESIO, PROMOTION)
 VALUES('$nom', '$prenom', '$Date', '$ad', '$cp', '$ville', '$tel', '$mail', '$opt', '$mp', '$annee', '$prom')";
 
$connexion->exec($req); //execution de la requ�te
header('Location: ../SuiviDeStages/RechercheEtudiant.php');//redirection de la page

?>