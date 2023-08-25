<?php
ob_start();
//liste des films ou tel role a été joué

foreach( $requete->fetchAll() as $film){ ?>
        
    <tr>
        <td><?= $film["titre"]?></td><br>
        <img src="<?= $film["affiche"] ?>">
        
        
    </tr>

<?php } 


$content = ob_get_clean();

require "view/template.php";
    ?>