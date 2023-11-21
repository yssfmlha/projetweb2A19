<?php
    include "'../controle/startupC.php'";
    include "../modele/startup.php";
    $startupC=new startupC();

        if(!empty($_POST["nom_startup"])&&!empty($_POST["domaine"])&&!empty($_POST["nom_fon"])&&!empty($_POST["prenom_fon"])
        &&!empty($_POST["description"]) &&!empty($_POST["email"])&&!empty($_POST["tel"])){
            $startup=new startup(NULL,$_POST["nom_startup"],$_POST["domaine"],
            $_POST["nom_fon"],$_POST["prenom_fon"],$_POST["description"],$_POST["email"],$_POST["tel"]);
            $startupC->addstartup2($startup);
            header("Location:liste.php");
            
        }
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I need</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/ae55347690.js" crossorigin="anonymous"></script>
    <script src="controle_saisie.js"></script>
</head>
<body>
<div class="gab">
<form  method="POST" >
    <div class="row">
        <div class="input-groupe">
            <input type="text"  id="Nom" name="nom_startup">
            <label for="Nom"><i class="fa-solid fa-suitcase"></i> Nom du Startup</label>
            <spam id="1"></spam>
        </div>
        
        <div class="input-groupe">
            <input type="text"  id="Domaine" name="domaine" >
            <label for="Domaine"> <i class="fa-solid fa-suitcase"></i> Domaine du Startup</label>
            <spam id="2"></spam>
        </div>
    </div>
    <div class="row2">
        <div class="input-groupe">
            <input type="text"  id="LastName" name="nom_fon">
            <label for="LastName"> <i class="fa-solid fa-user"></i> Nom  du fondateur</label>
            <spam id="3"></spam>
        </div>
        <div class="input-groupe">
            <input type="text"  id="FirstName" name="prenom_fon">
            <label for="FirstName"> <i class="fa-solid fa-user"></i> Prénom du fondateur</label>
            <spam id="4"></spam>
        </div>
    </div>
    <div class="input-groupe">
        <textarea   id="Description" rows="8" name="description"></textarea>
        <label for="Description"><i class="fa-solid fa-pen"></i> Description</label>
        <spam id="5"></spam>
    </div>
    <div class="input-groupe">
        <input type="email"  id="gmail" name="email">
        <label for="gmail"><i class="fa-solid fa-envelope"></i> Adresse Email</label>
        <spam id="6"></spam>
    </div>
    <div class="input-groupe">
        <input type="text"  id="number"name="tel" >
        <label for="number"><i class="fa-solid fa-phone"></i> Numéro de téléphone </label>
        <spam id="7"></spam>
    </div>
    <button type="submit" ><i class="fa-regular fa-paper-plane"></i>Enregistrer</button> 
    <button type="reset">Annuler</button>
</form>

</div>
</body>
</html>