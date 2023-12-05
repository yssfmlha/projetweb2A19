<?php
    include "../../../Controller/chariteC.php";
    $c=new ChariteC();
    $list=$c->dataAmount();
    echo("<table border='1'><tr><td>charity</td><td>amount</td></tr>");
    foreach($list as $tab){
        echo("<tr>");
        echo("<td>".$tab["chart"]."</td>");
        echo("<td>".$tab["sum"]."</td>");
        echo("</tr>");
    }
    echo("</tr></table>");
?>