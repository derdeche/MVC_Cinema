<?php ob_start();?>
<p class= "titre"><strong>Liste des Genres</strong></p>
    
<?php   foreach( $requete->fetchAll() as $genre){ ?>
        
        <div class="genre">
        <div class="rectangle">
                    <a href="index.php?action=detailGenre&id=<?= $genre["id_genre"] ?>">
                    <strong><?=  ucfirst($genre["genre"])?></strong></a>
                    </div>
        </div>
        
                 
        <?php } ?>

<?php

//$titre = "Liste des Genres";
//$titre_secondaire = "Liste des Genres";
$content = ob_get_clean();
require "view/template.php";

?>