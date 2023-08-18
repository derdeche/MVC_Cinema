<?php ob_start();?>

    <thead>
        <tr>
            <th>TITRE</th>
            <Th>ANNEE SORTIE</Th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach( $requete->fetchAll() as $film){ ?>
                
            <tr>
                <td><?= $film["titre"]?></td>
                <td><?= $film["anneeSortie"]?></td>
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