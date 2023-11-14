<?php
include "forumc.php";
include "forum.php";
$postc = new postc();
if (isset($_POST["text"]) || isset($_POST["image"])) {
    if (!empty($_POST["text"]) || !empty($_POST["image"])) {
        $post = new forum(NULL, $_POST["text"], $_POST["image"]);
        $postc->addpost($post);
        header("Location: listpost.php");
    }
} else {
    echo ("Missing Information");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <style>
        :root {
            --primary: #009CFF;
            --light: #F3F6F9;
            --dark: #191C24;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--light);
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        table tr {
            margin-bottom: 10px;
        }

        table td {
            padding: 10px;
        }

        input[type="text"],
        input[type="submit"],
        input[type="reset"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: var(--primary);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Text:</td>
                <td><input type="text" name="text"></td>
            </tr>
            <tr>
                <td>Image:</td>
                <td><input type="text" name="image"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit"></td>
                <td><input type="reset" value="Cancel"></td>
            </tr>
        </table>
    </form>
</body>

</html>
