<?php
ob_start();?>
<p class= "titre"><strong>Ajoutez un Casting</strong></p>
<form action="index.php?action=ajoutCasting" method="post">       
      
    <label >Film :</label>
    <select name="id_film" >
        <?php foreach($requeteFilm->fetchAll() as $film) {?>
            <option  value ="<?= $film['id_film']?>"><?=$film['titre']?></option>
        <?php  } ?>
    </select>    
        
    <label >Acteur : </label>           
    <select name="id_acteur" >
        <?php foreach($requeteActeur->fetchAll() as $personne){ ?>
            <option  value ="<?= $personne['id_acteur']?>"><?=$personne['nom']." ".$personne['prenom']?></option>
        <?php }?>
    </select> 
    
    <label >Rôle : </label>           
    <select name="id_role" >
        <?php foreach($requeteRole->fetchAll() as $role){ ?>
            <option  value ="<?= $role['id_role']?>"><?=$role['role']?></option>
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
