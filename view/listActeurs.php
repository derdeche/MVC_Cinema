<?php ob_start();?>
<p class= "titre"><strong>Liste des Acteurs</strong></p>
<?php
    foreach ($requete->fetchAll() as $role) { ?>
                    
                <div class="photo-acteur">
                    <a href="index.php?action=detailActeur&id=<?= $role["id_acteur"] ?>">
                    <img src=<?= $role["photo"] ?> >
                    <p ><strong><?= $role["nom"]." ".$role["prenom"] ?></strong></p>
                    </a> 
                </div>
                
        <?php } ?>
<?php
//$titre = "Liste des films";
//$titre_secondaire = "Liste des films";
$content = ob_get_clean();
require "view/template.php";

?>