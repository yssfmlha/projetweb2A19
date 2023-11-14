<?php
    include "forumc.php";
    $c=new postc();
    $id=$_GET["idd"];
    $c->deletepost($id);
    header("Location:listpost.php");
?>