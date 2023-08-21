<?php ob_start();?>
<p class= "titre">Liste des Acteurs</p>
<?php
    foreach ($requete->fetchAll() as $acteur) { ?>
                    
                <div class="photo-acteur">
                    <a href="index.php?action=detailsActeur&id=<?= $acteur["id_acteur"] ?>">
                    <img src="<?= $acteur["photo"] ?>" ></a>
                </div>
                
        <?php } ?>
<?php
//$titre = "Liste des films";
//$titre_secondaire = "Liste des films";
$content = ob_get_clean();
require "view/template.php";

?>