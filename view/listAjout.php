<?php 
ob_start();?>
<p class= "titre"><strong>Vous voulez </strong></p>

<div class="ajout">

    <div class="rectangle">
    <a href="index.php?action=ajoutFilm"><p class ="a"><strong>Ajouter un Film</strong></a>
    </div>

    <div class="rectangle">
    <a href="index.php?action=ajoutActeur"><p class ="a"><strong>Ajouter un Acteur</strong></a>
    </div>

    <div class="rectangle">
    <a href="index.php?action=ajoutRealisateur"><p class ="a"><strong>Ajouter un Réalisateur</strong></a>
    </div>

    <div class="rectangle">
    <a href="index.php?action=ajoutGenre"><p class ="a"><strong>Ajouter un Genre</strong></a>
    </div>

    <div class="rectangle">
    <a href="index.php?action=ajoutRole"><p class ="a"><strong>Ajouter un Rôle</strong></a>
    </div>

</div>








<?php
$title = "Liste Ajout";
$secondary_title = "Liste Ajout";

$content = ob_get_clean();
require "view/template.php";