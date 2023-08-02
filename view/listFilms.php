<?php ob_start();?>
<p class="uk-label uk-label-warning">Il y a 
    <?= $requete->rowCount() ?> films</p>

<table class = "uk-table uk-table-striped">
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