<!--RAMADANI Arbër 22/06/2012-->
<?
include('../Requetes/connexion.php');//ouverture de la connexion

//récupération des variables

$NumS = $_POST['txtNumS'];
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


//requête d'insertion de stage dans la base de données 

$req="Update stage set
LM = '$lm', 
LAM = '$lam', 
MM = '$mm', 
MAM = '$mam', 
MEM = '$mem', 
MEAM = '$meam', 
JM = '$jm', 
JAM = '$jam', 
VM = '$vm', 
VAM = '$vam', 
SM = '$sm', 
SAM = '$sam' 
Where NOSTAGE=$NumS";
$connexion->exec($req);

header('Location:../SuiviDeStages/Stage.php');
?>