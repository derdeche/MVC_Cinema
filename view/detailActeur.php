<?php
ob_start();
$acteur = $requeteA->fetch();
echo $acteur["nom"];








$content = ob_get_clean();

require "view/template.php";
    ?>