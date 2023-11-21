<?php

include '../controller/categorieC.php';
include '../model/categorie.php';
$error = "";

// create client
$categorie = null;
// create an instance of the controller
$categorieC = new categorieC();


if (
    isset($_POST["nom_categorie"]) 
) {
    if (
        !empty($_POST['nom_categorie']) 
    ) {
        
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $produit = new categorie(
            null,
            $_POST['nom_categorie'],
            
        );
        var_dump($categorie);
        
        $categorieC->updatecategorie($categorie, $_POST['Id_categorie']);

        header('Location:listcategorie.php');
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
    <button><a href="listcategorie.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['Id_categorie'])) {
        $produit = $produitC->showproduit($_POST['Id_categorie']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">Id categorie :</label></td>
                    <td>
                        <input type="text" id="Id_categorie" name="Id_categorie" value="<?php echo $_POST['Id_categorie'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom_categorie" name="nom_categorie" value="<?php echo $produit['nom_categorie'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
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