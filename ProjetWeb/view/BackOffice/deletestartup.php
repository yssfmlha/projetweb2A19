<?php
    include "../../controle/startupC.php";
    $c=new startupC();
    $id=$_GET["idd"];
    $c->deletestartup($id);
    header("Location:admin_startup.php");
?>