<?php
	//Pierrick nicolas 30/09/13
	// Fichier php de Connexion à la base de données mysql 
	header("Cache-Control: no-cache, must-revalidate");
	header('Content-Type: text/xml; charset=ISO-8859-1');
	include ("Connexion.php");

	$doc = new DOMDocument();

	$doc->version = '1.0';
	$doc->encoding = 'ISO-8859-1';
	
	$lesDemandes_elt=$doc->createElement('LesDemandes');
	$doc->appendChild($lesDemandes_elt);

	$req=("select NUMDEMANDE, NOENT, NOETUD, LIBELLEETAT, DATEDEMANDE, NOMPERSCONTACTEE, demande.NUMMODE from demande inner join modecontact on modecontact.nummode = demande.nummode inner join etat on etat.numetat = demande.numetat where NOETUD =".$_POST['AfficheEtud']);
	$result =$connexion->query($req);
	$ligne = $result->fetch();
	while($ligne== true)
	{

		$Demande_elt=$doc->createElement('Demande');		
		$numDemande_elt=$doc->createElement('NumeroDemande', $ligne['NUMDEMANDE']);
		$numEntre_elt=$doc->createElement('NumeroEntreprise', $ligne['NOENT']);
		$numEtud_elt=$doc->createElement('NumeroEtudiant', $ligne['NOETUD']);
		$numEtat_elt=$doc->createElement('NumeroEtat', $ligne['LIBELLEETAT']);
		$dateDem_elt=$doc->createElement('DateDemande', $ligne['DATEDEMANDE']);
		$nomContact_elt=$doc->createElement('NomContact', $ligne['NOMPERSCONTACTEE']);
		$numMode_elt=$doc->createElement('NumeroContact', $ligne['NUMMODE']);

		$lesDemandes_elt->appendChild($Demande_elt);
		$Demande_elt->appendChild($numDemande_elt);
		$Demande_elt->appendChild($numEntre_elt);
		$Demande_elt->appendChild($numEtud_elt);
		$Demande_elt->appendChild($numEtat_elt);
		$Demande_elt->appendChild($dateDem_elt);
		$Demande_elt->appendChild($nomContact_elt);
		$Demande_elt->appendChild($numMode_elt);
		$ligne = $result->fetch();	
	}
	
	//Sauvegarder le fichier	
	echo $doc->saveXML();
?>
