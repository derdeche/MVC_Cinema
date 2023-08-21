<?php
ob_start();


$film = $requete->fetch();

?>
<?= $film["titre"] ?>
<p>Sortie en <?= $film["anneeSortie"] ?>
        
        
    





$content = ob_get_clean();

require "view/template.php";
    ?>