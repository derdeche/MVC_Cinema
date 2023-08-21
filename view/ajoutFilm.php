<?php
ob_start();?>

<form action="index.php?action=ajoutFilm" method="post">

    <label >Nom du film :</label>
    <input type="textarea" name="titre" id="titre">

    <label >Année de sortie :</label>
    <input type="number" name="anneeSortie" id="anneeSortie">

    <label >Durée du film :</label>
    <input type="number" name="duree" id="duree">

    <label >Synopsis :</label>
    <input type="textarea" name="synopsis" id="synopsis">

    <label >URL de l'affiche :</label>
    <input type="textarea" name="affiche" id="affiche">

    <label for="note">Note du film sur 5 :</label>
    <input type="number" min="0" max="5" name="note" id="note">
    

<label >Genre du film : </label>           
    <select name ="id_genre" id="id_genre">
        <?php foreach($requete->fetchAll() as $genre){
            echo "<option value='".$genre['id_genre']."'>".$genre['genre']."</option>";
        }; ?>
    </select>           

  

<label >Réalisateur du film</label>
    <select name="id_realisateur" id="id_realisateur">
        <?php foreach($requete->fetchAll() as $director){
           echo "<option value='".$realisateur['id_realisateur']."'>".$realisateur['nom']."</option>";
        }; ?>
    </select>    
      
    <input type="submit" name="submit" value="Ajouter le Film">
</form>
       
       
        
<?php
$title = "Ajouter un Film";
$secondary_title = "Ajouter un Film ";
$content = ob_get_clean();
require "view/template.php";
?>
