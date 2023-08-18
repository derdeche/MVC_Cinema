<?php ob_start();?>
<table >
    <thead>
        <tr>
            <th>Genre</th>
            
            
        </tr>
    </thead>
    <tbody>
    <?php
        foreach( $requeteG->fetchAll() as $genre){ ?>
                
            <tr>
                <td><?= $genre["genre"]?></td>               
            </tr>
        
        <?php } ?>
    </tbody>
</table>
<?php

//$titre = "Liste des films";
//$titre_secondaire = "Liste des films";
$content = ob_get_clean();
require "view/template.php";

?>