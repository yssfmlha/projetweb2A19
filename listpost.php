<?php
require "forumc.php";
$c = new postc();
$tab = $c->listpost();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts List</title>
    <style>
        :root {
            --primary: #009CFF;
            --light: #F3F6F9;
            --dark: #191C24;
        }

        /* Add other CSS styles here */
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        h2 a {
            text-decoration: none;
            color: #007bff;
        }

        table {
            border: 2px solid #007bff;
            width: 100%;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #007bff;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #007bff;
            color: #fff;
        }

        table a {
            text-decoration: none;
            color: #ff0000;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Liste des posts</h1>
        <h2><a href='addpost.php'>Add Post</a></h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Text</th>
                <th>Image</th>
                <th>Delete</th>
            </tr>

            <?php
            foreach ($tab as $post) {
                echo("<tr>
                    <td>" . $post['id'] . "</td>
                    <td>" . $post['text'] . "</td>
                    <td>" . $post['image'] . "</td>
                    <td><a href='Deletepost.php?idd=" . $post['id'] . "'>DELETE</a></td>
                </tr>");
            }
            ?>
        </table>
    </div>

</body>
</html>
