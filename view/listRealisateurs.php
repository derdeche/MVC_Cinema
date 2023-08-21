<?php ob_start();?>
<p class= "titre">Liste des Réalisateurs</p>

<?php foreach ($requete->fetchAll() as $realisateur) { ?>
                    
                <div class="photo-realisateur">
                    <a href="index.php?action=detailRealisateur&id=<?= $realisateur["id_realisateur"] ?>">
                    <img src="<?= $realisateur["photo"] ?>" ></a>
                </div>
                
        <?php } ?>
<?php


//$titre = "Liste des Réalisateurs";
//$titre_secondaire = "Liste des Réalisateurs";
$content = ob_get_clean();
require "view/template.php";

?>