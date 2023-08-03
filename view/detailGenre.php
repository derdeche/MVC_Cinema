<?php
ob_start();

/*affichage liste des films du meme genre */
foreach( $requeteGenre->fetchAll() as $film){ ?>
        
    <tr>
        <td><?= $film["titre"]?></td><br>
        
        
    </tr>

<?php } 


$content = ob_get_clean();

require "view/template.php";
    ?>