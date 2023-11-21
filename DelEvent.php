<?php
include '../Controller/EventC.php' ;
$Event = new EventC () ;
$tab = $Event->delEvent($_GET['Matricule']);
header("Location:BackEvent.php");
?>