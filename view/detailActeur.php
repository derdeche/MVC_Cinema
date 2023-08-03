<?php
ob_start();
$acteur = $requeteA->fetch();
echo $acteur["nom"] ."<br>";
echo   $acteur["prenom"] ;








$content = ob_get_clean();

require "view/template.php";
    ?>