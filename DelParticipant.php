<?php
include '../Controller/ParticipantC.php' ;
$Event = new ParticipantC () ;
$tab = $Event->delParticipant($_GET['Matricule']);
header("Location:BackParticipant.php");
?>