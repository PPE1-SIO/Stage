<?php

require("../PDF/fpdf.php");
include("../Requetes/Connexion.php");


$pdf=new FPDF('L','mm','A4'); 
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();
$pdf->SetFillColor(232,232,232);
$pdf->Cell(100);

$pdf->SetFont('Arial','',8);
$pdf->Cell(100,6,'Liste détaillée des entreprises ',1,0,'C');
$pdf->ln(15);



$pdf->SetX(5);
$pdf->Cell(8,6,'Num',1,0,'LR',1);
$pdf->Cell(70,6,'Nom',1,0,'L',1);
$pdf->Cell(60,6,'Representant',1,0,'LR',1);
$pdf->Cell(45,6,'Adresse',1,0,'LR',1);
$pdf->Cell(17,6,'Code postal',1,0,'LR',1);
$pdf->Cell(45,6,'Ville',1,0,'LR',1);
$pdf->Cell(18,6,'Telephone',1,0,'LR',1);
$pdf->Cell(25,6,'dernier stagiaire',1,0,'LR',1);

$pdf->Ln();

$req='SELECT entreprise.NOENT, NOMENT, REPENT, QUALITEREP, ADRUEENT, CPENT, VILLEENT, TELENT, ANNEESTAGE FROM entreprise LEFT JOIN test ON entreprise.NOENT = test.NOENT';
$reult = $connexion->query($req);

while($ligne = $reult->fetch()){
	
    $num = $ligne['NOENT'];
    $nom = $ligne['NOMENT'];
    $repre = $ligne['REPENT'];
	$adr = $ligne['ADRUEENT'];
	$cp = $ligne['CPENT'];
	$ville= $ligne['VILLEENT'];
	$tel =$ligne['TELENT'];
	$annee =$ligne['ANNEESTAGE'];


	
    $pdf->SetX(5);
    $pdf->Cell(8,6,$num,1,'LR');
    $pdf->Cell(70,6,$nom,1,'LR');
    $pdf->Cell(60,6,$repre,1,'LR');
	$pdf->Cell(45,6,$adr,1,'LR');
	$pdf->Cell(17,6,$cp,1,'LR');
	$pdf->Cell(45,6,$ville,1,'LR');
	$pdf->Cell(18,6,$tel,1,'LR');
	$pdf->Cell(25,6,$annee,1,'LR');

	$pdf->Ln();
}
$pdf->Output();
?>




