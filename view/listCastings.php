<?php 
ob_start();







$content = ob_get_clean();
require "view/template.php";