<?php
    session_start();
    include("../Requetes/Connexion.php");
    include("../PDF/fpdf.php");
    

            
    class PDF extends FPDF 
    {

// En-tête
    function Header()
    {
        // Police Arial gras 15
        $this->SetFont('Arial','B',15);
        // Décalage à droite
        $this->Cell(80);
        // Titre
        $this->Cell(30,10,'Liste de demandes de stage',0,0,'C');
        // Saut de ligne
        $this->Ln(20);

    }
    
// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');
$pdf->SetFont('Times','',9);
//Requete permettant de récupérer le nom et prénom de l'élève
$numEtud = $_SESSION['noetud'];
$req = "SELECT NOMETUD, PRENOMETUD FROM etudiant WHERE NOETUD = '$numEtud'";
$sql = $connexion->query($req);
$ligneSql = $sql->fetch();
$Nom = $ligneSql['NOMETUD'];
$Prenom = $ligneSql['PRENOMETUD'];
$pdf->Cell(0,1, 'Nom : '.$Nom,0,1);
$pdf->Cell(0,15, 'Prenom : '.$Prenom,0,1);
$ligneSql = $sql->fetch();

// Titres des colonnes du tableau
$header = array('Nom de l\'entreprise', 'Contact', 'Ville', 'Telephone', 'Etat', 'Date', 'Relances');

// Chargement des données pour le tableau d'information
$reqDonneesTab = "SELECT NOMENT, NOMPERSCONTACTEE, ADRUEENT, CPENT, VILLEENT, TELENT, LIBELLEETAT, DATEDEMANDE, NUMDEMANDE
		FROM entreprise, etudiant, demande, etat
		WHERE entreprise.NOENT=demande.NOENT
		AND demande.NOETUD=etudiant.NOETUD
		AND etat.NUMETAT=demande.NUMETAT
		AND demande.NOETUD ='$numEtud'
		ORDER BY DATEDEMANDE";

//Ex�cution de la requete
$sqlDonneesTab = $connexion->query($reqDonneesTab);
$ligneDonneesTab = $sqlDonneesTab->fetch();
$DateDemande = $ligneDonneesTab['DATEDEMANDE'];
$Date = date('d-m-Y',strtotime($DateDemande));



        
        
 // Largeurs des colonnes
    $w = array(80, 50, 40, 20, 35, 20, 15, 18);
    // En-tête
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Données
   while($ligneDonneesTab == TRUE)
    {
        $ligneRelance = $ligneDonneesTab['NUMDEMANDE'];
	$reqNbRelance = "SELECT count(NUMDEMANDE) AS NombreRelance FROM relance WHERE NUMDEMANDE='$ligneRelance'";
	$sqlNbRelance = $connexion->query($reqNbRelance);
	$ligneNbRelance = $sqlNbRelance->fetch();
                
        $nomEnt = $ligneDonneesTab['NOMENT'];
        $contact = $ligneDonneesTab['NOMPERSCONTACTEE'];
        $ville = $ligneDonneesTab['VILLEENT'];
        $tel = $ligneDonneesTab['TELENT'];
        $etat = $ligneDonneesTab['LIBELLEETAT'];
        $date = $ligneDonneesTab['DATEDEMANDE'];
        $nbRelance = $ligneNbRelance['NombreRelance'];
        
                
        $pdf->Cell($w[0],6,$nomEnt,'LR');
        $pdf->Cell($w[1],6,$contact,'LR');
        $pdf->Cell($w[2],6,$ville,'LR');
        $pdf->Cell($w[3],6,$tel,'LR');
        $pdf->Cell($w[4],6,$etat,'LR');
        $pdf->Cell($w[5],6,$date,'LR'); 
        $pdf->Cell($w[6],6,$nbRelance,'LR');
        $pdf->Ln();
        
        $ligneDonneesTab = $sqlDonneesTab->fetch();
    }

        // Trait de terminaison
        $pdf->Cell(array_sum($w),0,'','T');

$pdf->Output();
?>

