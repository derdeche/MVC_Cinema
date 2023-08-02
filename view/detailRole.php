<?php
ob_start();
$role = $requeterole->fetch();
echo $role["role"];








$content = ob_get_clean();

require "view/template.php";
    ?>