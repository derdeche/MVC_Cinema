<?php
ob_start();?>
<p class= "titre">Détails du Réalisateur</p>
<?php
    foreach ($requete->fetchAll() as $realisateur) { ?>
                    
                <div class="photo-acteur">
                    
                    <img src="<?= $realisateur["photo"] ?>" >

                </div>
                
        <?php } ?>
<?php
//$titre = "Liste des Réalisateurs";
//$titre_secondaire = "Liste des Réalisateurs";
$content = ob_get_clean();

require "view/template.php";
    ?>