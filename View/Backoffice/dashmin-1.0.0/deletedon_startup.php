<?php
    include "../../controle/don_startupC.php";
    $c=new don_startupC();
    $id=$_GET["idd"];
    $c->deletedon_startup($id);
    header("Location:admindon_startup.php");
?>