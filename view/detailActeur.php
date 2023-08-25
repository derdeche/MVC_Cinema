<?php
ob_start();
$acteur = $requete->fetch(); ?>

  
        
               
<img src=<?= $acteur["photo"] ?>>             
<p><?= $acteur["nom"] . " " . $acteur["prenom"] ?></p>
<p><?= $acteur["dateNaissance"] ?></p>
<p><?= $acteur["sexe"] ?></p>

<p>Filmographie</p>  
<?php
foreach($requeteF->fetchAll() as $film){?>
<a href="index.php?action=detailFilm&id=<?=$film["id_film"]?>"><?=$film["titre"]?></a>
     
<?php } ?>        
       
<?php






$content = ob_get_clean();

require "view/template.php";
    ?>