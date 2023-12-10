<?php
include '../../../../Controller/ParticipantC.php' ;
$Event = new ParticipantC () ;
$tab = $Event->delParticipant($_GET['Matricule'],$_GET["idevent"]);
header("Location:BackParticipant.php");
?>