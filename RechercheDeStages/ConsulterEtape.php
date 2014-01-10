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
				traiterReponse(xhr.responseXML); 
			}
		};
		xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");	// changement du type MIME de la requête car méthode POST utilisée
		xhr.send("AfficheEtud=" + idEtud);	// envoi de la requête et du paramètre
	}
function traiterReponse(reponse)
 {
 	var i,listePdt;
	var pdts=reponse.getElementsByTagName("Demande");	// récupère tous les noeuds "Demande"

	 listePdt=document.getElementById("Demande");	
	 listePdt.innerHTML =" <table> <tr> <td>Numéro de demande</td> 	<td>Numéro de l'entreprise</td> <td>Numéro de l'etudiant</td> <td>Etat</td>	<td>Date de demande</td> <td>Nom du contact</td> <td>Numéro du contact</td> </tr>";//créer l'en-tête du tableu
	
	for (i=0;i<pdts.length;i++)		// parcourir tous les noeuds "Demande"
			{
				pdt=pdts.item(i);	// récupère le noeud "Demande" se trouvant à la position i
				
				elements=pdt.getElementsByTagName("*");	// récupère tous les noeuds enfants d'un noeud "Demande"
				
				numDemande=elements.item(0).firstChild.nodeValue;
				numEntreprise=elements.item(1).firstChild.nodeValue;
				numEtudiant=elements.item(2).firstChild.nodeValue;
				numEtat=elements.item(3).firstChild.nodeValue;
				dateDemande=elements.item(4).firstChild.nodeValue;
				nomContact=elements.item(5).firstChild.nodeValue;
				numContact=elements.item(6).firstChild.nodeValue;
				//alert(numDemande);	
				var mon_tableau = new Array(numDemande, numEntreprise, numEtudiant, numEtat, dateDemande, nomContact, numContact );//Créer un tableau et le rempli avec les valeur ci-dessus
				listePdt.innerHTML = listePdt.innerHTML + " <td> " + numDemande + "</td>  <td> " + numEntreprise + "</td> <td> " + numEtudiant + "</td> <td> " + numEtat + "</td> <td> " + dateDemande + "</td> <td> " + nomContact + "</td>  <td> " + numContact + "</td>";//affiche un tableau javascript dans le html 

			}
			listePdt.innerHTML = listePdt.innerHTML + "</table>";
  }

	</script>
	<body>
		<?php
			$sql = "SELECT NOETUD, NOMETUD, PRENOMETUD FROM etudiant";
			$res = $connexion->query($sql);
			$ligne = $res->fetch();
		?>
		<form name="Etudiant">
			<select name="AfficheEtud" onchange="envoyerRequete('../Requetes/ReqConsulterEtape.php',this.value)" >
			<option><--Selectionner un Etudiant--></option>
			<?php
			while($ligne == TRUE){	
				echo "<option value=".$ligne['NOETUD'].">".$ligne['PRENOMETUD']." ".$ligne['NOMETUD']."</option>";
				$ligne = $res->fetch();							
			}
			?>
			</select>
			<table id="Demande">
			</table>
		</form>
	</body>
</html>