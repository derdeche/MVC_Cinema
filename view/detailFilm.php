<?php
ob_start();
$film = $requeteF->fetch();
echo $film["titre"];







$content = ob_get_clean();

require "view/template.php";
    ?>