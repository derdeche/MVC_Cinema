<?php
ob_start();?>
<p class= "titre">Liste des Réalisateurs</p>
<?php
    foreach ($requete->fetchAll() as $acteur) { ?>
                    
                <div class="photo-acteur">
                    <a href="index.php?action=detailsActeur&id=<?= $acteur["id_acteur"] ?>">
                    <img src="<?= $acteur["photo"] ?>" ></a>
                </div>
                
        <?php } ?>
<?php
//$titre = "Liste des Réalisateurs";
//$titre_secondaire = "Liste des Réalisateurs";
$content = ob_get_clean();

require "view/template.php";
    ?>