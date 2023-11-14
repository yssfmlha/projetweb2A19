<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    
    <style>
        :root {
            --primary: #009CFF;
            --light: #F3F6F9;
            --dark: #191C24;
        }

        .back-to-top {
            position: fixed;
            display: none;
            right: 45px;
            bottom: 45px;
            z-index: 99;
        }

        /* ... (include the rest of your CSS styles here) ... */

        .testimonial-carousel .owl-dot.active {
            background: var(--dark);
            border-color: var(--primary);
        }

        /* Adjusted styles for the table */
        table {
            border-collapse: collapse;
            width: 70%;
            margin: auto;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: var(--light);
        }

        tr:nth-child(even) {
            background-color: var(--light);
        }


    </style>
</head>
<body>

<?php
include '../controller/categorieC.php';
$c = new categorieC();
$tab = $c->listcategorie();
?>

<?php if ($tab !== null) : ?>
    <table>
        <tr>
            <th>Id_categorie</th>
            <th>nom_categorie</th>
            <th>action/admin</th>
            <th>action/admin</th>
        </tr>
        <?php foreach ($tab as $categorie) : ?>
            <tr>
                <td><?php echo $categorie["nom_categorie"]; ?></td>
                <td><?php echo $categorie["Id_categorie"]; ?></td>
                <td><a href="deletecategorie.php?Id_categorie=<?php echo $categorie['Id_categorie']; ?>">Delete</a></td>
                <td><a href="updatecategorie.php?Id_categorie=<?php echo $categorie["Id_categorie"]; ?>">UPDATE</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else : ?>
    <p>No categories found.</p>
<?php endif; ?>

<br></br>



<table>
    <thead>
        <tr>
            <th>ID_prod</th>
            <th>nom_prod</th>
            <th>Quantité</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 1; $i <= 22; $i++) {
            echo "<tr>";
            echo "<td>{$i}</td>";
            echo "<td>Product{$i}</td>";
            echo "<td>40</td>"; 
            echo "<td>20Dt</td>"; 
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

</body>
</html>