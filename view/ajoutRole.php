<?php
ob_start();
?>
<p class= "titre"><strong>Ajoutez un Rôle</strong></p>
<form action="index.php?action=ajoutRole" method="post">
<input type='text' name='role' placeholder= "Nom du Role">    </input>
<input type="submit" name="submit" value="Ajouter"></input>
</form>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$content = ob_get_clean();
require "view/template.php"

?>