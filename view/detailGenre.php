<?php
ob_start();

/*affichage liste des films du meme genre */
foreach( $requete->fetchAll() as $film){ ?>
        
    
    
        <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">
                        <img src="<?= $film["affiche"] ?>"></a>
        <?= $film["titre"]?>
        
        
    

<?php } 


$content = ob_get_clean();

require "view/template.php";
    ?>