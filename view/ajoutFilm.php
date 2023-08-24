<?php
ob_start();?>
<p class= "titre"><strong>Ajoutez un Film</strong></p>
<form action="index.php?action=ajoutFilm" method="post">

    <label >Titre :</label>
    <input type="text" name="titre"  placeholder="Nom du film ">

    <label >Année de sortie :</label>
    <input type="number" name="anneeSortie" >

    <label >Durée :</label>
    <input type="number" name="duree" >

    <label >Synopsis :</label>
    <textarea name="synopsis" id="" cols="30" rows="10"></textarea>

    <label >Photo :</label>
    <input type="text" name="affiche" placeholder= "URL">

    <label >Note :</label>
    <input type="number" min="1" max="5" name="note" >
        
    <label >Genre : </label>           
    <select name="id_genre">
        <?php foreach($requeteG->fetchAll() as $genre){ ?>
             <option value="<?= $genre['id_genre']?>"><?=$genre['genre']?></option>
        <?php }?>
    </select>           

  

    <label >Réalisateur :</label>
        <select name="id_realisateur">
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
