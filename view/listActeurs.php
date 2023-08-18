<?php ob_start();?>
<table >
    <thead>
        <tr>
            <th>nom</th>
            <Th>prenom</Th>
            
        </tr>
    </thead>
    <tbody>
    <?php
        foreach( $requeteA->fetchAll() as $personne){ ?>
                
            <tr>
                <td><?= $personne["nom"]?></td>
                <td><?= $personne["prenom"]?></td>
                
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