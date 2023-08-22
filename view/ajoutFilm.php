<?php
ob_start();?>

<form action="index.php?action=ajoutFilm" method="post">

    <label >Titre :</label>
    <input type="textarea" name="titre"  placeholder="Nom du film ">

    <label >Année de sortie :</label>
    <input type="number" name="anneeSortie" >

    <label >Durée :</label>
    <input type="number" name="duree" >

    <label >Synopsis :</label>
    <input type="textarea" name="synopsis" >

    <label >Photo :</label>
    <input type="textarea" name="affiche" placeholder= "URL">

    <label >Note :</label>
    <input type="number" min="1" max="5" name="note" >
        
    <label >Genre : </label>           
    <select >
        <?php foreach($requete->fetchAll() as $genre){ ?>
             <option value="<?= $genre['id_genre']?>"><?=$genre['genre']?></option>
        <?php }?>
    </select>           

  

    <label >Réalisateur :</label>
        <select >
            <?php foreach($requeteR->fetchAll() as $realisateur) {?>
                <option value="<?= $realisateur['id_realisateur']?>"><?=$realisateur['nom']." ".$realisateur['prenom']?></option>
        <?php  } ?>
        </select>    
        
        <input type="submit" name="submit" value="Ajouter le Film">
    </form>
       
       
        
<?php
$title = "Ajouter un Film";
$secondary_title = "Ajouter un Film ";
$content = ob_get_clean();
require "view/template.php";
?>
