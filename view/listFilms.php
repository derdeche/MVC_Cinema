<?php ob_start();?>

    
        <div class="container"> 
    
            <?php foreach( $requete->fetchAll() as $film ){ ?>
                                        
            <div class = "photo">
            <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">
                        <img src="<?= $film["affiche"] ?>"  >                     
            </div></a>
        </div>
        <?php }            



//$titre = "Liste des films";
//$titre_secondaire = "Liste des films";
$content = ob_get_clean();
require "view/template.php";

?>