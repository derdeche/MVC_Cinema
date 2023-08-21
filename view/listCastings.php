<?php 
ob_start();?>

<p class= "titre">Liste des Castings</p>
<?php   foreach ($requete->fetchAll() as $jouer) { ?>
    <div class="casting">
        <p>L'acteur <a href="index.php?action=detailActeur&id=<?=$jouer['id_acteur']?>"><?=$jouer["nom"] . " " . $jouer["prenom"] ?></a></p> 
        <p>a joué le Role de :<a href="index.php?action=detailRole&id=<?=$jouer['id_role']?>"> <?= $jouer["role"] ?> </a>
        <p>dans : <a href="index.php?action=detailFilm&id=<?=$jouer['id_film']?>"> <?= $jouer["titre"] ?> </a></p> 
    </div>                    
<?php } ?>                    
                  
<?=
$title = "Liste des Castings";
$secondary_title = "Liste des Castings";

$content = ob_get_clean();
require "view/template.php";
                            
                              
                                  
                                    

                                    
                                
                 
        

