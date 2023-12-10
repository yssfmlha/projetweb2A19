<?php
include '../../controle/startupC.php' ;
$startup= new startupC ();
$affichage= $startup->afficherstartup();
?>
<center><h1>liste de startups</h1></center>
<table border="1" align="center" width = "70%" >
    <tr>
    <th>id_startup</th>
    <th>Nom_startup</th>
    <th>Domaine</th>
    <th>Nom_fondateur</th>
    <th>Prénom_fondateur</th>
    <th>Description</th>
    <th>Email</th>
    <th>telephone</th>
    </tr>
    <?php
    foreach($affichage as $startup )
    {?>
        <tr>
            <td><?php echo $startup["id_startup"];?></td>
            <td><?php echo $startup["Nom"];?></td>
            <td><?php echo $startup["domaine"];?></td>
            <td><?php echo $startup["nom_f"];?></td>
            <td><?php echo $startup["prenom"];?></td>
            <td><?php echo $startup["de"];?></td>
            <td><?php echo $startup["email"];?></td>
            <td><?php echo $startup["telephone"];?></td>
            <td><a href = "deletestartup.php?idd=<?php echo $startup["id_startup"];?>">Delete</a></td>
            <td><a href = "updatestartup.php?idd=<?php echo $startup["id_startup"];?>">Update</a></td>
        </tr>
    <?php
    }?>
</table>