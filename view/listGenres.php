<?php ob_start();?>
<p class= "titre">Liste des Genres</p>
    
<?php   foreach( $requete->fetchAll() as $genre){ ?>
            <div class="genre">
                    <a href="index.php?action=detailGenre&id=<?= $genre["id_genre"] ?>">
                    "<?= $genre["genre"]?>"</a>
            </div>
                         
                    
        <?php } ?>

<?php

//$titre = "Liste des Genres";
//$titre_secondaire = "Liste des Genres";
$content = ob_get_clean();
require "view/template.php";

?>