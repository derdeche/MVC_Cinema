<?php
ob_start();
?>
<p class= "titre"><strong>Ajoutez un Genre</strong></p>

<form action="index.php?action=ajoutGenre" method="post">
    <div class="rect">
        <div class="rectangle1">
        <input id="genre" name="nomGenre" /><br>
        </div>
        <div class="rectangle1">
        <input type="submit" name="submit">
        </div>
    </div>
</form>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$content = ob_get_clean();
require "view/template.php";

?>