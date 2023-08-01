<table class = "uk-table uk-table-striped">
    <thead>
        <tr>
            <th>nom</th>
            <Th>prenom</Th>
            <th>date de naissance</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach( $requete->fetchAll() as $personne){ ?>
                
            <tr>
                <td><?= $personne["nom"]?></td>
                <td><?= $personne["prenom"]?></td>
                <td><?=$personne["dateNaissance"]?></td>
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