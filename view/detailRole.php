<?php
ob_start();
//liste des films ou tel role a été joué

foreach( $requeteRole->fetchAll() as $film){ ?>
        
    <tr>
        <td><?= $film["titre"]?></td><br>
        
        
    </tr>

<?php } 


$content = ob_get_clean();

require "view/template.php";
    ?>