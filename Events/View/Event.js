function verifierDecimal(InputId,MessageId) {
  var inputElement = document.getElementById(InputId);
  var entreeUtilisateur = inputElement.value;
  var valeur = parseFloat(entreeUtilisateur);
  var messageElement = document.getElementById(MessageId);
    if (/^\s*-?\d+(\.\d+)?\s*$/.test(entreeUtilisateur) && !isNaN(valeur) && valeur !== 0) {
        messageElement.innerText = "";
    } 
    else 
    {
      messageElement.innerText = "L'entrée n'est pas un nombre décimal non nul.";
      event.preventDefault();
    }
}

function validerEtAfficher(InputId , MessageId) 
{
  var inputChaine = document.getElementById(InputId).value;
  var estValide = validerChaineAvecLettre(inputChaine);
  var messageElement = document.getElementById(MessageId);
  if (estValide) 
  {
    messageElement.textContent = "";
  } 
  else 
  {
    messageElement.textContent = "La chaîne n'est pas valide.";
    event.preventDefault();
  }
}
function validerChaineAvecLettre(chaine) {
  var expressionReguliere = /[a-zA-Z]/;
  return chaine && chaine.length > 0 && expressionReguliere.test(chaine);
}

function validateDates() {
  var startDateInput = document.getElementById('Dated');
  var endDateInput = document.getElementById('Datef');
  var startDate = new Date(startDateInput.value);
  var endDate = new Date(endDateInput.value);
  var today = new Date();
  var messageElement2 = document.getElementById('validationMessage2');
  var messageElement3 = document.getElementById('validationMessage3');
  if (!startDateInput.value.trim() || !endDateInput.value.trim()) {
    messageElement2.textContent = "Veuillez entrer à la fois la date de début et la date de fin.";
    messageElement3.textContent = "Veuillez entrer à la fois la date de début et la date de fin.";
    event.preventDefault();
  }
  else if (startDate >= endDate) {
      messageElement2.textContent = "La date de début doit être inférieure à la date de fin.";
      messageElement3.textContent = "La date de fin doit être postérieure à la date de début.";
      event.preventDefault();
  } 
  else if (startDate < today) {
      messageElement3.textContent = "Les dates doivent être postérieures à la date d'aujourd'hui.";
      messageElement2.textContent = "Les dates doivent être postérieures à la date d'aujourd'hui.";
      event.preventDefault();
  } 
  else {
      messageElement2.textContent = "";
      messageElement3.textContent = "";
  }
}

function validerChaineNonVideEtAfficher() {
  var inputChaineNonVide = document.getElementById("About").value;
  var estValide = validerChaineNonVide(inputChaineNonVide);
  var messageElementNonVide = document.getElementById("validationMessage4");
  if (estValide) 
  {
    messageElementNonVide.textContent = "";
  } 
  else 
  {
    messageElementNonVide.textContent = "La chaîne est vide. Veuillez entrer une valeur.";
    event.preventDefault();
  }
}

function validerChaineNonVide(chaine) {
  return chaine.trim() !== "";
}

function ValiderAdd(){
  verifierDecimal('Matricule','resultatMessage');
  validerEtAfficher("Nom","validationMessage");
  validerEtAfficher("Adresse","validationMessage1");
  validerChaineNonVideEtAfficher();
  verifierDecimal('Prix','validationMessage5');
  verifierDecimal('NBTKT','validationMessage6');
  validateDates();
}
