<?php
ob_start();?>


<?php
    foreach ($requete->fetchAll() as $film) { ?>
                    
                    <?= $film["titre"] ?>
<p>Sortie en <?= $film["anneeSortie"] ?>
<p>Durée : <?=$film["duree"]?></p>
<p><?=$film["synopsis"]?></p>
<img src="<?=$film["affiche"]?>">
<p>Note : <?=$film["note"]?></p>
                
        <?php } ?>     
        
    




<?=
$content = ob_get_clean();

require "view/template.php";
    ?>