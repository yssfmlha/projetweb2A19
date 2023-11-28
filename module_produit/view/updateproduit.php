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
    isset($_POST)
) {
    if (
        !empty($_POST['nom_produit']) &&
        !empty($_POST["prix_produit"]) &&
        !empty($_POST["qte_produit"]) 
    ) {
        echo("aaaaaa");
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $produit = new produit(
            null,
            $_POST['nom_produit'],
            $_POST['prix_produit'],
            $_POST['qte_produit'],
        );
        var_dump($produit);
        
        $produitC->updateproduit($produit, $_POST['id_produit']);

        header('Location:listproduit.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listproduit.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_produit'])) {
        $produit = $produitC->showproduit($_POST['id_produit']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">Idproduit :</label></td>
                    <td>
                        <input type="text" id="id_produit" name="id_produit" value="<?php echo $_POST['id_produit'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom_produit" name="nom_produit" value="<?php echo $produit['nom_produit'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom">prix :</label></td>
                    <td>
                        <input type="text" id="prix_produit" name="prix_produit" value="<?php echo $produit['prix_produit'] ?>" />
                        <span id="erreurPrenom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">qte :</label></td>
                    <td>
                        <input type="text" id="qte_produit" name="qte_produit" value="<?php echo $produit['qte_produit'] ?>" />
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                


                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>