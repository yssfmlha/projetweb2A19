
      function validerprod() {
        alert("hhhh");
        var nom_produit = document.getElementById('nom_produit').value;
        var prix_produit = document.getElementById('prix_produit').value;
        var qte_produit = document.getElementById('qte_produit').value;

        var erreurNom = document.getElementById('erreurNom');
        var erreurPrix = document.getElementById('erreurPrix');
        var erreurQte = document.getElementById('erreurQte');
        

        var regexTexte = /^[a-zA-Z\s]*$/; 
        var regexNombre = /^[0-9]+$/; 

     
        if (nom_produit.match(regexTexte)!=TRUE) {
            erreurNom.innerHTML = "Veuillez saisir un nom valide (pas de nombres ou symboles).";
            alert("no");
            return false;

        } 

     
        if (!prix_produit.match(regexNombre)) {
            erreurPrix.innerHTML = "Veuillez saisir un prix valide";
            return false;
        } else {
            erreurPrix.innerHTML = "";
        }

       
        if (!qte_produit.match(regexNombre)) {
            erreurQte.innerHTML = "Veuillez saisir une quantité valide ";
            return false;
        } else {
            erreurQte.innerHTML = "";
        }

        
        return true;
      }
    function validercat(){
        var cat=document.getElementById("nom_cat").value;
        var regexTexte = /^[a-zA-Z\s]*$/;
        if(!regexTexte.test(cat)||cat==""){
            alert("donner une categorie valide");
            return false;
        }
    }