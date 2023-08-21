<?php 
ob_start();?>

<div class="ajout">
<a href="index.php?action=ajoutFilm"><p class ="a">Ajouter un Film</a>
</div>

<div class="ajout">
<a href="index.php?action=ajoutActeur"><p class ="a">Ajouter un Acteur</a>
</div>

<div class="ajout">
<a href="index.php?action=ajoutRealisateur"><p class ="a">Ajouter un Réalisateur</a>
</div>

<div class="ajout">
<a href="index.php?action=ajoutGenre"><p class ="a">Ajouter un Genre</a>
</div>

<div class="ajout">
<a href="index.php?action=ajoutRole"><p class ="a">Ajouter un Roles</a>
</div>








<?php
$title = "Liste Ajout";
$secondary_title = "Liste Ajout";

$content = ob_get_clean();
require "view/template.php";