<?php ob_start();?>
<p class= "titre">Liste des Roles</p>
    <?php
        foreach( $requete->fetchAll() as $role){ ?>
            <div class="role">
                    <a href="index.php?action=detailRole&id=<?= $role["id_role"] ?>">
                    "<?= $role["role"]?>"</a>
                </div>
                         
                    
        <?php } ?>

<?php
       
         

//$titre = "Liste des Roles";
//$titre_secondaire = "Liste des Roles";
$content = ob_get_clean();
require "view/template.php";

?>