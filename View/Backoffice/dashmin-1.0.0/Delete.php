<?php
    include "../../../Controller/DonC.php";
    $c=new DonC();
    $id=$_GET["id"];
    $c->deleteDon($id);
    header("Location:table.php");
?>