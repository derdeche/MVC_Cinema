<?php
ob_start();?>
<p class= "titre"><strong>Ajoutez un Casting</strong></p>
<form action="index.php?action=ajoutFilm" method="post">
           
    
    
    
    <label >Film :</label>
    <select >
        <?php foreach($requeteR->fetchAll() as $film) {?>
            <option value=<?= $film['id_film']?>><?=$film['titre']?></option>
            <?php  } ?>
        </select>    
        
    <label >Acteur : </label>           
    <select >
        <?php foreach($requete->fetchAll() as $personne){ ?>
            <option value=<?= $personne['id_acteur']?>><?=$personne['nom']." ".$personne['prenom']?></option>
        <?php }?>
    </select> 
    
    <label >Rôle : </label>           
    <select >
        <?php foreach($requete->fetchAll() as $role){ ?>
            <option value=<?= $role['id_role']?>><?=$role['role']?></option>
        <?php }?>
    </select>

        <input type="submit" name="submit" value="Ajouter le Casting">
</form>
       
       
        
<?php
$title = "Ajouter un Casting";
$secondary_title = "Ajouter un Casting ";
$content = ob_get_clean();
require "view/template.php";
?>
