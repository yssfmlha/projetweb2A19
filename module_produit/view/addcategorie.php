<?php
include '../Controller/categorieC.php';
include '../model/categorie.php';

$error = "";

// create category
$categorie = null;

// create an instance of the controller
$categorieC = new categorieC();
if (isset($_POST["nom_cat"])) {
    if (!empty($_POST['nom_cat'])) {
        $categorie = new categorie(
            null,
            $_POST['nom_cat']
        );
        $categorieC->addcategorie($categorie);
        header('Location: listcategorie.php');
        exit();
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORIE</title>

    <style>
        :root {
            --primary: #009CFF;
            --light: #F3F6F9;
            --dark: #191C24;
        }

        body {
            background-color: var(--light);
            margin: 0;
            font-family: Arial, sans-serif;
        }

        #error {
            color: red;
        }

        table {
            width: 50%;
            margin: 20px auto;
        }

        td {
            padding: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: var(--primary);
            color: #FFFFFF;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        #erreurNom {
            color: red;
        }
    </style>
</head>

<body>
    <a href="listcategorie.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" onsubmit="return validercat()">
        <table>
            <tr>
                <td><label for="nom_cat">Nom categorie:</label></td>
                <td>
                    <input type="text" id="nom_cat" name="nom_cat" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>
<script src="script.js"></script>
</html>