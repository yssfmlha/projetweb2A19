<?php

include '../controller/produitC.php';
include '../model/produit.php';

$error = "";

// create client
$produit = null;

// create an instance of the controller
$produitC = new produitC();

if (
    isset($_POST["nom_produit"]) &&
    isset($_POST["prix_produit"]) &&
    isset($_POST["qte_produit"]) 
    
) {
    
    if (
        
        !empty($_POST['nom_produit']) &&
        !empty($_POST["prix_produit"]) &&
        !empty($_POST["qte_produit"]) 
    ) {
        
        $produit = new produit(
            null,
            $_POST['nom_produit'],
            $_POST['prix_produit'],
            $_POST['qte_produit'],
            
        );
        echo($produit->getnom_produit());
        $produitC->addproduit($produit);
        header("Location:listproduit.php");
        
    } else{
        $error = "Missing information";
}}


?>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit </title>
    <script> scr="script.js"</script>
</head>

<body>
    <a href="listproduit.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form method="POST" onsubmit="return validerprod();">
        <table>
            <tr>
                <td><label for="nom_produit">Nom :</label></td>
                <td>
                    <input type="text" id="nom_produit" name="nom_produit" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prix_produit">prix_produit :</label></td>
                <td>
                    <input type="text" id="prix_produit" name="prix_produit" />
                    <span id="erreurPrenom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="qte_produit">qteproduit :</label></td>
                <td>
                    <input type="text" id="qte_produit" name="qte_produit" />
                    <span id="erreurEmail" style="color: red"></span>
                </td>
            </tr>


            <td>
                <input type="submit" value="Save" >
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
    <script>
    function validerprod() {
        // Get form input values
        var nomProduit = document.getElementById("nom_produit").value;
        var prixProduit = document.getElementById("prix_produit").value;
        var qteProduit = document.getElementById("qte_produit").value;

        // Reset error messages
        document.getElementById("erreurNom").innerHTML = "";
        document.getElementById("erreurPrenom").innerHTML = "";
        document.getElementById("erreurEmail").innerHTML = "";

        // Flag to track if there are any validation errors
        var hasErrors = false;

        // Validation for the "Nom" field
        if (nomProduit.trim() === "") {
            document.getElementById("erreurNom").innerHTML = "Nom is required.";
            hasErrors = true;
        }

        // Validation for the "Prix" field
        if (prixProduit.trim() === "") {
            document.getElementById("erreurPrenom").innerHTML = "Prix is required.";
            hasErrors = true;
        } else if (isNaN(parseFloat(prixProduit))) {
            document.getElementById("erreurPrenom").innerHTML = "Prix must be a number.";
            hasErrors = true;
        }

        // Validation for the "Quantité" field
        if (qteProduit.trim() === "") {
            document.getElementById("erreurEmail").innerHTML = "Quantité is required.";
            hasErrors = true;
        } else if (isNaN(parseInt(qteProduit))) {
            document.getElementById("erreurEmail").innerHTML = "Quantité must be a number.";
            hasErrors = true;
        }

        // Return false to prevent the form from submitting if there are errors
        return !hasErrors;
    }
</script>
</body>

</html>