<?php
    include "../../controle/projetsC.php";
    $c=new projetsC();
    $id=$_GET["idd"];
    $c->deleteprojets($id);
    header("Location:adminprojets.php");
?>