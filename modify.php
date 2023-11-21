<?php
include "forumc.php";
include "forum.php";
function getCurrentDateTime() {
    return date("Y-m-d H:i:s");
}
$c=new postc();
$id=$_GET["idd"];
if (isset($_POST["auther"]) &&isset($_POST["title"]) && isset($_POST["text"]) ) {
    if (!empty($_POST["auther"]) &&!empty($_POST["title"]) &&!empty($_POST["text"]) ) {
        $post = new forum(NULL,$_POST["auther"],$_POST["title"], $_POST["text"],getCurrentDateTime());
        $c->updatepost($post,$id);
        header("Location: listpost.php");
    }
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
                <td>Auther:</td>
                <td><input type="varchar" name="auther"></td>
            </tr> 
            <tr>
                <td>Title:</td>
                <td><input type="varchar" name="title"></td>
            </tr>
            <tr>
                <td>Text:</td>
                <td><input type="text" name="text"></td>
            </tr>
                <td><input type="submit" value="Submit"></td>
                <td><input type="reset" value="Cancel"></td>
            </tr>
        </table>
    </form>
</body>

</html>