<?php
ob_start();
$realisateur = $requeteR->fetch();
echo $realisateur["nom"];








$content = ob_get_clean();

require "view/template.php";
    ?>