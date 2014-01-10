<html>
<!--Fait par Nicolas Rivault,Pierrick Chevessier-->
<!--Dernieres modification : 02/12/2013 -->


<?php
	session_start();
	include ("../Requetes/Connexion.php");
	$PseudoEleve = $_SESSION['pseudoeleve'];
	$PseudoProf = $_SESSION['pseudoprof'];	
?>
	<head>
		<title>Accueil</title>
		<link rel="stylesheet" media="screen" type="text/css" title="Stage" href="../CSS/Style.css" />
	</head>
	<body>
		<header>
			<img src="../images/logo.png" alt="logo du site" /> 
			<h2>Accueil</h2>	
<?php
	if( empty($PseudoProf)){
?>			
			<h3>Connecté en tant que : <?php echo( $PseudoEleve['NOMETUD'])?></h3>
<?php
	}else{
?>
			<h3>Connecté en tant que professeur : <?php echo( $PseudoProf['NOMPROF'])?></h3>
<?php
	}
?>			
			<table class="barreMarron">
				<tr>		
					<td><label for="Accueil"><a href="../Commun/Accueil.php">Accueil</a></label></td>				
					<form id="start" action="../Requetes/Deconnexion.php" method="POST"/>
					<td><label for="Deconnexion"><a href="../Requetes/Deconnexion.php" >Deconnexion</a></label></td>		
				</tr>
			</table>			 
		</header>
<?php
	if( empty($PseudoProf)){
?>			
		<form class="form1">   	
			<nav>
				<label label for="Stage"><a href="../RechercheDeStages/AjouterDemandeStage.php" ><li>Saisir une demande de stage</li></a></label>
				<label label for="ModificationStage"><a href="../RechercheDeStages/ModificationDemande.php" ><li>Modifier mes demandes de stage </li></a></label>
				<label label for="Entreprise"><a href="../RechercheDeStages/SaisirEntreprise.php" ><li>Saisir une Entreprise</li></a></label>
				<label label for="InsererEtat"><a href="../Requetes/InsererEtat.php"><li>Inserer un nouvel etat de demande</li></a></label>
				<label label for="ConsultationEntrepriseAcceuil"><a href="../RechercheDeStages/ConsulterEntrepriseAccueil.php" ><li>Entreprises contactées par les étudiants d’une même promotion</li></a></label>
				<label label for="ConsultationEntrepriseParOption"><a href="../RechercheDeStages/ConsulterEntrepriseParOption.php" ><li>Entreprises accueillant des stagiaires pour chaque option </li></a></label>
				<label label for="AfficherMesDemandes"><a href="../RechercheDeStages/MesRecherches.php" ><li>Mes Demandes de stage</li></a></label>
				<label label for="FichierPDFe"><a href="../RechercheDeStages/PDFentrepriseele.php" ><li>Fichier pdf des entreprises</li></a></label>
				<label label for="engagement"><a href="../RechercheDeStages/FicheEngagement.php" ><li>Fiche engagement</li></a></label>
			</nav>
		</form>
<?php
	}else{
?>
		<form class="form1">   	
			<nav>
				<label label for="Entreprise"><a href="../RechercheDeStages/SaisirEntreprise.php" ><li>Saisir une Entreprise</li></a></label>
				<label label for="ConsultationEntrepriseAcceuil"><a href="../RechercheDeStages/ConsulterEntrepriseAccueil.php" ><li>Entreprises contactées par les étudiants d’une même promotion</li></a></label>
				<label label for="ConsultationEntrepriseParOption"><a href="../RechercheDeStages/ConsulterEntrepriseParOption.php" ><li>Entreprises accueillant des stagiaires pour chaque option </li></a></label>
				<label label for="FichierPDF"><a href="../RechercheDeStages/PDFentreprise.php" ><li>Fichier pdf des entreprises</li></a></label>
				<label label for="Consetape"><a href="../RechercheDeStages/ConsulterEtape.php" ><li>Entreprises contactées par étudiant</li></a></label>				
			</nav>
		</form>	
<?php
	}
?>			
	</body>
</html>