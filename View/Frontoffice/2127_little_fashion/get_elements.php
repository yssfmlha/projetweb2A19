<?php
include "../../../Controller/ChariteC.php";
$c=new ChariteC();
$charite=$c->listcharite();
$pageSize = 3;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$startIndex = ($page - 1) * $pageSize;
$endIndex = min($startIndex + $pageSize - 1, count($charite) - 1);

// Output elements for the current page
for ($i = $startIndex; $i <= $endIndex; $i++) {
    echo("                        
    <div class='col-lg-4 col-12 mb-3' style='border: 1px solid #000;box-shadow: 0px -5px 10px rgba(0, 0, 0, 0.3);width:1200px;'>
    <div class='product-thumb'>
        <div class='product-info d-flex'>
            <div>
            <table>
            <tr>
                <td>
                <h5 class='product-title mb-0'>
                    <a href='contact.php?idc=".$charite[$i]["id_charite"]."&namec=".$charite[$i]["nom_charite"]."' class='product-title-link'>".$charite[$i]["nom_charite"]."</a>
                </h5>

                <p class='product-p'>".$charite[$i]["description"]."</p>
                <p class='product-p'><span style='font-weight:bold;color:black;'>Founder:</span>".$charite[$i]["fullnamefondateur"]."</p>
                <p class='product-p'><span style='font-weight:bold;color:black;'>Email:</span>".$charite[$i]["email"]."</p>
                <p class='product-p'><span style='font-weight:bold;color:black;'>Tel:</span>".$charite[$i]["tel"]."</p>
                </td>
            </tr>
            </table>    
            </div>
        </div>
    </div>
</div>");
}
?>
