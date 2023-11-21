<?php
include '../controle/don_startupC.php' ;
$startup= new don_startupC ();
$affichage= $startup->afficherdon_startup();
?>
<center><h1>liste de  dons de startups</h1></center>
<table border="1" align="center" width = "70%" >
    <tr>
    <th>id_don_startup</th>
    <th>id_startup</th>
    <th>Montant</th>
    <th>Numéro de carte bancaire</th>
    <th>Date d'expire</th>
    <th>CVV</th>
    <th>Supprimer don</th>
    <th>Mise a jour don</th>
    </tr>
    <?php
    foreach($affichage as $startup )
    {?>
        <tr>
            <td><?php echo $startup["id_don_startup"];?></td>
            <td><?php echo $startup["id_startup"];?></td>
            <td><?php echo $startup["montant"];?></td>
            <td><?php echo $startup["cardnum"];?></td>
            <td><?php echo $startup["date_expire"];?></td>
            <td><?php echo $startup["CVV"];?></td>
            <td><a href = "deletedon_startup.php?idd=<?php echo $startup["id_don_startup"];?>">Delete</a></td>
            <td><a href = "updatedon_startup.php?idd=<?php echo $startup["id_don_startup"];?>">Update</a></td>
        </tr>
    <?php
    }?>
</table>