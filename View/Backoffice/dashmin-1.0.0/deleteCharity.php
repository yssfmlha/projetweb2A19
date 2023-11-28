<?php
    include "../../../Controller/ChariteC.php";
    $c=new ChariteC();
    $id=$_GET["id"];
    $c->deleteCharite($id);
    header("Location:charity.php");
?>