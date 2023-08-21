<?php ob_start();?>
<p class= "titre"><strong>Liste des Roles</strong></p>
    <?php
        foreach( $requete->fetchAll() as $role){ ?>
        <div class="role">
            <div class="rectangle">
                    <a href="index.php?action=detailRole&id=<?= $role["id_role"] ?>">
                    <strong><?= ucfirst($role["role"])?></strong></a>
                </div>
        </div>                 
                    
        <?php } ?>

<?php
       
         

//$titre = "Liste des Roles";
//$titre_secondaire = "Liste des Roles";
$content = ob_get_clean();
require "view/template.php";

?>