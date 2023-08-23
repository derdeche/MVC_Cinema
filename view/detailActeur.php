<?php
ob_start();?>

<?php
    foreach ($requete->fetchAll() as $acteur) { ?>
        
               
                    <img src="<?= $acteur["photo"] ?>" >
              <?=$acteur["id_acteur"]?>
                    <p><?= $acteur["nom"] . " " . $acteur["prenom"] ?></p>
                    <p><?= $acteur["dateNaissance"] ?></p>
          
        <?php } ?>
<?php






$content = ob_get_clean();

require "view/template.php";
    ?>