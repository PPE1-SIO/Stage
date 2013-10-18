<!--nicolas 23/09-->
<?php
session_start();
include('../Requetes/Connexion.php');//ouverture de la connexion

//r�cup�ration des variables

$numEtud = $_POST['txtNumProf'];
$noEtud = $_POST['txtNoEtud'];
$noEnt = $_POST['txtNoEnt'];
$tuteur = $_POST['txtTuteur'];
$cr = $_POST['optCr'];
$adS = $_POST['txtAd'];
$villeS = $_POST['txtVille'];
$cpS = $_POST['txtCP'];
$annee = $_POST['txtAnnee'];
$mailS = $_POST['txtMail'];
$lm = $_POST['txtLm'];
$lam = $_POST['txtLam'];
$mm = $_POST['txtMm'];
$mam = $_POST['txtMam'];
$mem = $_POST['txtMem'];
$meam = $_POST['txtMeam'];
$jm = $_POST['txtJm'];
$jam = $_POST['txtJam'];
$vm = $_POST['txtVm'];
$vam = $_POST['txtVam'];
$sm = $_POST['txtSm'];
$sam = $_POST['txtSam'];
$nomAct = preg_replace('/\'/', '\'\'', $_POST['txtNomAct']);

//requ�te d'insertion de stage dans la base de donn�es 

$req="INSERT INTO stage(NUMPROF, NOETUD, NOENT, TUTEUR, CONVENTIONDONNEE, adRueStage, VILLESTAGE, CPSTAGE, ANNEESTAGE, MAILSTAGE, LM, LAM, MM, MAM, MEM, MEAM, JM, JAM, VM, VAM, SM, SAM, LIBELLEACTIVITE)
VALUES('$numEtud', '$noEtud', '$noEnt', '$tuteur', '$cr', '$adS', '$villeS', '$cpS', '$annee', '$mailS', '$lm', '$lam', '$mm', '$mam', '$mem', '$meam', '$jm', '$jam', '$vm', '$vam', '$sm', '$sam', '$nomAct')";

$sql = $connexion->exec($req);
header("Location: ../SuiviDeStages/RechercheStage.php");
?>