<?php
include '../../../../Controller/categorieC.php';


if (isset($_GET["Id_categorie"])) {
    $id = $_GET["Id_categorie"];

    
    $categorieC = new categorieC();

    $categorieC->deletecategorie($id);

  
    header('Location: listcategorie.php');
    exit();
} else {
    
    echo "Error: Missing category ID";
}
?>