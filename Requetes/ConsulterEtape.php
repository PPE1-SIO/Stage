<!--Pierrick 30/09/13-->
<html>
	<?php
		session_start();
		
		include ("../Requetes/Connexion.php");
		include ("../Commun/EnTete.php");
	?>	
	
	<head>
		<title></title>
		<link rel="stylesheet" media="screen" type="text/css" title="Stage" href="../CSS/Style.css" />
	</head>
	<script type="text/javascript">
	// reçoit l'url de la page à exécuter et l'id de la catégorie pour la requête à exécuter
	function envoyerRequete(url,idEtud)	
	{
		var xhr = new XMLHttpRequest();	// création de l'objet XMLHttpRequest

		xhr.open("POST", url, true);	// ouverture de la requête http
		xhr.onreadystatechange = function() {	// à chaque changement d'état
		
			if (xhr.readyState == 4 && xhr.status == 200) {		// vérifier l'état et si tout s'est correctement déroulé
				//accède à l'élément nbPdt de la page HTML par son id (méthode getElementById) et en modifie le HTML (propriété innerHTML)
				traiterReponse(xhr.responseText); 
			}
		};
		xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");	// changement du type MIME de la requête car méthode POST utilisée
		xhr.send("AfficheEtud=" + idEtud);	// envoi de la requête et du paramètre
	}
	function traiterReponse(reponse)
 {
	var nbPdt,listePdt;
	var TabProduits=reponse.split('/'); // découper la réponse en utilisant le caractère inséré entre chaque produit dans la page getProduits.php
	nbPdt=TabProduits.length;				// déterminer le nombre de produits du tableau TabProduits
	
	listePdt=document.getElementById("listePdt");	// récupérer l'objet d'id listePdt de la page html
	listePdt.length=nbPdt;					// le nombre d'items de la liste est maintenant celle de TabProduits
	
	listePdt.size=nbPdt;		

	for (var i=0; i<nbPdt; i++)
	{
		var id = TabProduits[i].split('*');
 		listePdt.options[i].text=id[0];	// ajouter les produits à la liste
		listePdt.options[i].value=id[1];
	}
 }
	</script>
	<body>
		<form class="form1">   	
			<nav>
				<label label for="Entreprise"><a href="SaisirEntreprise.php" ><li>Saisir une Entreprise</li></a></label>
				<label label for="InsererEtat"><a href="InsererEtat.php"><li>Inserer un nouvel etat de demande</li></a></label>
				<label label for="InsererContact"><a href="InsererContact.php" ><li>Inserer un Mode de Contact</li></a></label>
				<label label for="ConsultationEntrepriseAccueil"><a href="ConsulterEntrepriseAccueil.php" ><li>Entreprises contactées par les étudiants d’une même promotion</li></a></label>
				<label label for="ConsultationEntrepriseParOption"><a href="ConsulterEntrepriseParOption.php" ><li>Entreprises accueillant des stagiaires pour chaque option </li></a></label>
				<label label for="ListeStageEtudiant"><a href="ConsulterEtape.php" ><li>Consulter la liste des demandes de stages d'un etudiant</li></a></label>
			</nav>
		</form>
		<?php
			$sql = "SELECT NOETUD, NOMETUD, PRENOMETUD FROM etudiant";
			$res = $connexion->query($sql);
			$ligne = $res->fetch();
		?>
		<form name="Etudiant">
			<select name="AfficheEtud" onchange="envoyerRequete('../Requetes/ReqConsulterEtape.php',this.value)">
			<?php
			while($ligne == TRUE){	
				echo "<option value=".$ligne['NOETUD'].">".$ligne['PRENOMETUD']." ".$ligne['NOMETUD']."</option>";
				$ligne = $res->fetch();							
			}
			?>
			</select>		
		</form>
	</body>
</html>