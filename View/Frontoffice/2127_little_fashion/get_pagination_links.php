<?php
include "../../../Controller/ChariteC.php";
$c=new ChariteC();
$charite=$c->listcharite();
$pageSize = 3;
$totalPages = ceil(count($charite) / $pageSize);

// Output pagination links
for ($page = 1; $page <= $totalPages; $page++) {
    echo "<a href='#' onclick='loadPage($page)'><button class='form-control butt'>Page $page</button></a><br> ";
}
?>
