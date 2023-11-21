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

function validerDateEtAfficher(InputId , MessageId ) {
  var inputDate = document.getElementById(InputId).value;
  var estValide = validerFormatDate(inputDate);
  var messageElement = document.getElementById(MessageId);
  if (estValide) 
  {
    messageElement.textContent = "";
  } 
  else
  {
    messageElement.textContent = "La date n'est pas valide. Utilisez le format JJ/MM/AA.";
    event.preventDefault();
  }
}
function validerFormatDate(date) {
  var expressionReguliere = /^\d{1,2}\/\d{1,2}\/\d{2}$/;
  return expressionReguliere.test(date);
}

function comparerDatesEtAfficher() {
  var dateDebut = convertirEnDate(document.getElementById("Dated").value);
  var dateFin = convertirEnDate(document.getElementById("Datef").value);
  var messageElement = document.getElementById("validationMessage3");
  if (dateDebut && dateFin) {
    var estSuperieure = dateFin > dateDebut;
    if (estSuperieure) {
      messageElement.textContent = "";
    } 
    else 
    {
      messageElement.textContent = "La date de fin est inférieure ou égale à la date de début.";
      event.preventDefault();
    }
  } 
  else 
  {
    messageElement.textContent = "Veuillez entrer des dates valides au format JJ/MM/AA.";
    event.preventDefault();
  }
}
function convertirEnDate(dateString) {
  var match = dateString.match(/^(\d{1,2})\/(\d{1,2})\/(\d{2})$/);
  if (match) {
    var day = parseInt(match[1], 10);
    var month = parseInt(match[2], 10) - 1;
    var year = parseInt(match[3], 10) + 2000;
    if (day > 0 && day <= 31 && month >= 0 && month <= 11 && year >= 2000) {
      var dateObject = new Date(year, month, day);
      if (!isNaN(dateObject.getTime())) {
        return dateObject;
      }
    }
  }
  return null;
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
  validerDateEtAfficher("Dated","validationMessage2");
  validerChaineNonVideEtAfficher();
  verifierDecimal('Prix','validationMessage5');
  verifierDecimal('NBTKT','validationMessage6');
  comparerDatesEtAfficher();
}
