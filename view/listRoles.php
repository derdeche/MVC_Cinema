<table class = "uk-table uk-table-striped">
    <thead>
        <tr>
            <th>role</th>
            
            
        </tr>
    </thead>
    <tbody>
    <?php
        foreach( $requeteR->fetchAll() as $role){ ?>
                
            <tr>
                <td><?= $role["role"]?></td>               
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