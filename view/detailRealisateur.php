<?php
ob_start();
$realisateur = $requete->fetch();

?>
<p class= "titre">Détails du Réalisateur</p>

                    
                <!-- <div class="photo-acteur"> -->
                    
                    <img src=<?= $realisateur["photo"] ?>>
                    <p><?= $realisateur["nom"]." ". $realisateur["prenom"]  ?></p>
                    <p><?= $realisateur["dateNaissance"] ?></p>
                    <p><?=$realisateur["sexe"]?></p>
                    
                <!-- </div> -->
                
<p>Liste des Films réalisés</p>  
<?php
foreach($requeteF->fetchAll() as $film){?>
 <p><?=$film["titre"]?></p>
     
<?php } ?>
<?php
//$titre = "Liste des Réalisateurs";
//$titre_secondaire = "Liste des Réalisateurs";
$content = ob_get_clean();

require "view/template.php";
    ?>

