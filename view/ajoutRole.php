<?php
ob_start();
?>
<p class= "titre"><strong>Ajoutez un Rôle</strong></p>
<form action="index.php?action=ajoutRole" method="post">
    <input id="role" name="nomRole" />
    <input type="submit" name="submit">
</form>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$content = ob_get_clean();
require "view/template.php"

?>