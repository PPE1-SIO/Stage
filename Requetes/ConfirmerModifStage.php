<!--RAMADANI Arbër 10/06/2012-->
<?
include('../Requetes/connexion.php');//ouverture de la connexion

//récupération des variables

$NumS = $_POST['txtNumS'];
$Tuteur = $_POST['txtTuteur'];
$Cr = $_POST['optCr'];
$AdS = $_POST['txtAd'];
$VilleS = $_POST['txtVille'];
$CpS = $_POST['txtCP'];
$AnneeS = $_POST['txtAnnee'];
$MailS = $_POST['txtMail'];
$ActS = preg_replace('/\'/', '\'\'', $_POST['txtNomAct']);

//requête d'insertion de stage dans la base de données 

$req="Update stage set TUTEUR = '$Tuteur',
 CONVENTIONDONNEE='$Cr',
 adRueStage = '$AdS',
 VILLESTAGE='$VilleS',
 CPSTAGE='$CpS',
 ANNEESTAGE= '$AnneeS',
 MAILSTAGE= '$MailS',
 LIBELLEACTIVITE='$ActS'
Where NOSTAGE=$NumS";

$connexion->exec($req);
header('Location: ../SuiviDeStages/RechercheStage.php');
	
?>