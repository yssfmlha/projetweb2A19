<html>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
    </html>
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
    isset($_POST["qte_produit"]) &&
    isset($_GET["categorie_ref"])
    
) {
    
    if (
        
        !empty($_POST['nom_produit']) &&
        !empty($_POST["prix_produit"]) &&
        !empty($_POST["qte_produit"]) &&
        !empty($_GET["categorie_ref"])
    ) {
        
        $produit = new produit(
            null,
            $_POST['nom_produit'],
            $_POST['prix_produit'],
            $_POST['qte_produit'],
            $_GET['categorie_ref'],
            
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
       
        var nomProduit = document.getElementById("nom_produit").value;
        var prixProduit = document.getElementById("prix_produit").value;
        var qteProduit = document.getElementById("qte_produit").value;

        
        document.getElementById("erreurNom").innerHTML = "";
        document.getElementById("erreurPrenom").innerHTML = "";
        document.getElementById("erreurEmail").innerHTML = "";

        
        var hasErrors = false;

       
        if (nomProduit.trim() === "") {
            document.getElementById("erreurNom").innerHTML = "Nom is required.";
            hasErrors = true;
        }

      
        if (prixProduit.trim() === "") {
            document.getElementById("erreurPrenom").innerHTML = "Prix is required.";
            hasErrors = true;
        } else if (isNaN(parseFloat(prixProduit))) {
            document.getElementById("erreurPrenom").innerHTML = "Prix must be a number.";
            hasErrors = true;
        }

       
        if (qteProduit.trim() === "") {
            document.getElementById("erreurEmail").innerHTML = "Quantité is required.";
            hasErrors = true;
        } else if (isNaN(parseInt(qteProduit))) {
            document.getElementById("erreurEmail").innerHTML = "Quantité must be a number.";
            hasErrors = true;
        }

       
        return !hasErrors;
    }
</script>
</body>

</html>