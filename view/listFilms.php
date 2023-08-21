<?php ob_start();?>

    
        
    
            <?php foreach( $requete->fetchAll() as $film ){ ?>
                
                <div class = "photo">
                <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">
                        <img src="<?= $film["affiche"] ?>">
                        <p ><strong><?= $film["titre"] ?></strong></p>                  
                </a>
                </div>
        <!-- </div> -->
        <?php }            



//$titre = "Liste des films";
//$titre_secondaire = "Liste des films";
$content = ob_get_clean();
require "view/template.php";

?>