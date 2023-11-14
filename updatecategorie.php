<?php
include '../Controller/categorieC.php';

if (isset($_GET["Id_categorie"])) {
    $id = $_GET["Id_categorie"];

   
    $categorieC = new categorieC();
    $categorieData = $categorieC->getcategorie($id);


if (!empty($categorieData)) {
    $categorieC = new categorieC($categorieData['Id_categorie'], $categorieData['nom_categorie']);
} else {
   
    echo "Erreur: Catégorie non trouvée.";
    exit();
}


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
// Dans votre fichier updatecategorie.php
if (isset($_POST["nom_categorie"])) {
    // Mettre à jour le nom de la catégorie
    $nouveauNom = $_POST["nom_categorie"];
    $categorie->setnom_cat($nouveauNom);

    // Mettre à jour la catégorie dans la base de données
    $categorieC->updatecategorie($categorie, $id);

    // Rediriger vers la liste des catégories après la mise à jour
    header('Location: listcategorie.php');
    exit();
} else {
    echo "Erreur: Le nom de la catégorie est manquant.";
}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
</head>
<body>
    <h1>Update Category</h1>
    
    <form method="POST" action="">
        <label for="nom_categorie">Nouveau nom de catégorie:</label>
        <input type="text" id="nom_categorie" name="nom_categorie" value="<?php echo $categorie["nom_categorie"]; ?>">
        <input type="submit" value="Mettre à jour">
    </form>
    
    <a href="listcategorie.php">Retour à la liste des catégories</a>
</body>
</html>
<?php
} else {
    echo "Erreur: ID de catégorie manquant.";
}
?>
