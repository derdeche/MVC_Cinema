<?php ob_start();?>
<p class= "titre"><strong>Liste des Acteurs</strong></p>
<?php
    foreach ($requete->fetchAll() as $acteur) { ?>
                    
                <div class="photo-acteur">
                    <a href="index.php?action=detailsActeur&id=<?= $acteur["id_acteur"] ?>">
                    <img src=<?= $acteur["photo"] ?> >
                    <p ><strong><?= $acteur["nom"]." ".$acteur["prenom"] ?></strong></p>
                    </a> 
                </div>
                
        <?php } ?>
<?php
//$titre = "Liste des films";
//$titre_secondaire = "Liste des films";
$content = ob_get_clean();
require "view/template.php";

?>