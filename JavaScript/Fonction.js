//fonction pour surligner en cas d'erreur de saisie
function surligne(champ, erreur){
	if(erreur){
		//Si il y a une erreur le champ est surlign�
		champ.style.borderColor="red";
	} else {
		//Sinon on garde la couleur devient bleu
		champ.style.borderColor="green";
	}
}


//fonction pour v�rifier le code postal
function verifCP(champ){
	//variable pour stocker la contrainte
	var CodePostal = /^[0-9]{5}$/; 
	
	if(!CodePostal.test(champ.value) || !champ.value.length == 5){
		surligne(champ, true);
		return false;
	//si il n'y a pas d'erreur cel� continue
	} else {
		
		surligne(champ, false);
		return true;
	}
}


//fonction pour v�rifier la saisie des champs suivant : nom de l'entreprise, repr�sentant, la qualit� du repr�sentant et de la ville
function verifSaisie(champ){
	//variable pour stocker la contrainte
	var verifS = /^[a-zA-Z-_.���\s]+$/;  
	
	if(!verifS.test(champ.value) || champ.value.length == 0){		
		surligne(champ, true);
		return false;
	//Si il n'y a pas d'erreur cel� continue
	} else {
		surligne(champ, false);
		return true;
	}
}


//fonction pour v�rifier la saisie des champs suivant : nom de l'entreprise, repr�sentant, la qualit� du repr�sentant et de la ville
function verifNomEnt(champ){
	//variable pour stocker la contrainte
	var verifS = /^[A-Za-z-_.���\s]+$/;  
	
	if(!verifS.test(champ.value) || champ.value.length == 0){		
		surligne(champ, true);
		return false;
	//Si il n'y a pas d'erreur cel� continue
	} else {
		surligne(champ, false);
		return true;
	}
}


//fontion pour v�rifier l'adresse de l'entreprise
function verifAdr(champ){
	var adE = /^[0-9a-zA-Z���\s]*$/; //variable pour stoquer la contrainte
	if(!adE.test(champ.value) || champ.value.length == 0){
		//Si la valeur saisie ne correspond pas au regex il y a erreur
		surligne(champ, true);
		return false;
	} else {
		//Sinon il n'y a pas d'erreur et on passe � la suite
		surligne(champ, false);
		return true;
	}
}


//fonction pour v�rifier le num�ro de t�l�phone
function verifTel(champ){
	var TelE = /^[0-9]{10}$/;
	//si la valeur ne contient pas 10 chiffres cel� g�n�ra une erreur
	if(!TelE.test(champ.value) || !champ.value.length == 10){
		surligne(champ, true);
		return false;
	//si il n'y a pas d'erreur cel� continue
	} else {		
		surligne(champ, false);
		return true;
	}
}


//fonction pour v�rifier la date de demande d'un stage
function verifDateDemande(champ){
	//variable pour stoquer la contrainte
	var dd = /^[0-9]{2}-[0-9]{2}-[0-9]{4}$/;
	//Si la valeur saisie ne correspond pas au regex il y a erreur
	if(!dd.test(champ.value) || champ.value.length == 0){
		surligne(champ, true);
		return false;
	//Sinon il n'y a pas d'erreur et on passe � la suite
	} else {		
		surligne(champ, false);
		return true;
	}
}

//fonction pour v�rifier la date de naissance
function verifDateNaissance(champ){
	//variable pour stoquer la contrainte
	var dd = /^[0-9]{2}-[0-9]{2}-[0-9]{4}$/;
	//Si la valeur saisie ne correspond pas au regex il y a erreur
	if(!dd.test(champ.value) || champ.value.length == 0){
		surligne(champ, true);
		return false;
	//Sinon il n'y a pas d'erreur et on passe � la suite
	} else {		
		surligne(champ, false);
		return true;
	}
}

//fonction pour v�rifier la promotion
function verifProm(champ){
	//variable pour stoquer la contrainte
	var prom = /^[0-9]{4}-[0-9]{4}$/;
	//Si la valeur saisie ne correspond pas au regex il y a erreur
	if(!prom.test(champ.value) || champ.value.length == 0){
		surligne(champ, true);
		return false;
	//Sinon il n'y a pas d'erreur et on passe � la suite
	} else {		
		surligne(champ, false);
		return true;
	}
}

//fonction pour v�rifier la promotion
function verifMail(champ){
	//variable pour stoquer la contrainte
	var mail = /^[0-9a-zA-Z-_0.]+\@[0-9a-zA-Z-_0.]+\.[a-zA-Z]{2,6}$/;
	//Si la valeur saisie ne correspond pas au regex il y a erreur
	if(!mail.test(champ.value) || champ.value.length == 0){
		surligne(champ, true);
		return false;
	//Sinon il n'y a pas d'erreur et on passe � la suite
	} else {		
		surligne(champ, false);
		return true;
	}
}

//fonction pour v�rifier la promotion
function verifHoraireS(champ){
	//variable pour stoquer la contrainte
	var horaire = /^[0-9]{1,2}\h\-[0-9]{1,2}\h$/;
	//Si la valeur saisie ne correspond pas au regex il y a erreur
	if(!horaire.test(champ.value) || champ.value.length == 0){
		surligne(champ, true);
		return false;
	//Sinon il n'y a pas d'erreur et on passe � la suite
	} else {		
		surligne(champ, false);
		return true;
	}
}

//fonction pour v�rifier l'ann�e d'un stage
function verifDateDemande(champ){
	//variable pour stoquer la contrainte
	var annee = /^[0-9]{2}\-[0-9]{2}\-[0-9]{4}$/;
	//Si la valeur saisie ne correspond pas au regex il y a erreur
	if(!annee.test(champ.value) || champ.value.length == 0){
		surligne(champ, true);
		return false;
	//Sinon il n'y a pas d'erreur et on passe � la suite
	} else {		
		surligne(champ, false); 
		return true;
	}
}


//fonction qui permet de v�rifier si les champs ont �t� valid�s pour la demande d'un stage
function verifFonctionsDemandeStage(f){
	if(verifDateDemande(f.DateDemande) && verifSaisie(f.txtNom)){
		return true;
	}else{
		return false;
	}
}

//fonction qui permet de v�rifier si les champs ont �t� valid�s pour la relance d'un stage
function verifFonctionsRelanceStage(f){
	if(verifDateDemande(f.DateDemande)){
		return true;
	}else{
		return false;
	}
}

//fonction qui permet de v�rifier si les champs ont �t� valid�s pour la saisie d'une entreprise	
function verifFonctionsSaisirEntreprise(f){
	if(verifSaisie(f.txtNom) && verifSaisie(f.txtRepEnt) && verifSaisie(f.txtQR) && verifAdr(f.txtAd) && verifSaisie(f.txtVille) && verifCP(f.txtCP) && verifTel(f.txtTel) && verifNomEnt(f.txtNom)){
		if(confirm('Nom de l\'entreprise :' + f.txtNom.value + '\n Repr�sentant :' + f.txtRepEnt.value + '\n Qualit� du repr�sentant :' + f.txtQR.value + 
		'\n Adresse :' + f.txtAd.value + '\n Code postal :' + f.txtCP.value + '\n T�l�phone :' + f.txtTel.value)){
		return true;		
		}else{
		return false;
		}
	}else{
		return false;
	}
}

//fonction qui permet de v�rifier si les champs ont �t� valid�s pour l'ajout d'un mode de contact
function verifFonctionsInsererContact(f){
	if(verifSaisie(f.txtNom)){
		if(confirm('Mode de Contact :' + f.txtNom.value)){
			return true;		
		}else{
			return false;
		}
	}else{
		return false;
	}
}


//fonction pour tester les champs d'�tudiant
function verificationEtud(f){
	if(verifSaisie(f.txtNom) && verifSaisie(f.txtPrenom) && verifSaisie(f.txtVille) && verifCP(f.txtCP) && 
	verifAdr(f.txtAd) && verifDateNaissance(f.txtDN) && verifTel(f.txtTel) && verifProm(f.txtProm) && verifMail(f.txtMail)){
	//Si tout est bien saisie, alors on passe � la suite
		return true;
	} else {
		//Sinon on bloque la page
		return false;
	}
}

//fonction pour tester les champs de l'entreprise
function verificationEntreprise(f){
	if(verifSaisie(f.txtNom) && verifSaisie(f.txtRepEnt) && verifSaisie(f.txtQR) && verifAdr(f.txtAd) && 
	verifCP(f.txtCP) && verifSaisie(f.txtVille) && verifTel(f.txtTel)){
	//Si tout est bien saisie, alors on passe � la suite
		return true;
	} else {
		//Sinon on bloque la page
		return false;
	}
}

//fonction pour tester les champs de stage
function verificationStage(f){
	if(verifSaisie(f.txtTuteur) && verifAdr(f.txtAd) && verifSaisie(f.txtVille) && verifCP(f.txtCP) && 
	verifMail(f.txtMail) && verifAnnee(f.txtAnnee) &&
	verifHoraireS(f.txtLm) && verifHoraireS(f.txtLam) && verifHoraireS(f.txtMm) && verifHoraireS(f.txtMam) && 
	verifHoraireS(f.txtMem) && verifHoraireS(f.txtMeam) && verifHoraireS(f.txtJm) && verifHoraireS(f.txtJam) && 
	verifHoraireS(f.txtVm) && verifHoraireS(f.txtVam)){
	//Si tout est bien saisie, alors on passe � la suite
		return true;
	} else {
		//Sinon on bloque la page
		return false;
	}
}