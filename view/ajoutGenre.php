<?php
ob_start();
?>
 
<form action="index.php?action=ajoutGenre" method="post">
    <input id="genre" name="nomGenre" />
    <input type="submit" name="submit">
</form>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$content = ob_get_clean();
require "view/template.php"

?>