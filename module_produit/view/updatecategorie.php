<?php

include '../controller/categorieC.php';
include '../model/categorie.php';
$error = "";
$Ctg= new categorieC() ;
$tab = $Ctg->listcategorie() ;
foreach($tab as $CTG )
{
    if($CTG['Id_categorie'] == $_GET['Id_categorie'])
    {
        break;
    }
}

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
        $categorie = new categorie(
            $_POST['Id_categorie'],
            $_POST['nom_categorie']
            
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

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">Id categorie :</label></td>
                    <td>
                        <input type="text" id="Id_categorie" name="Id_categorie" value="<?php echo $CTG['Id_categorie'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom_categorie" name="nom_categorie" value="<?php echo $CTG['nom_categorie'] ?>" />
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
    ?>
</body>

</html>