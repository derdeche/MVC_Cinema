<?php
ob_start();
?>
<p class= "titre"><strong>Ajoutez un Acteur</strong></p>
<form action="index.php?action=ajoutActeur" method="post">

    <label >Prénom :</label>
    <input type="textarea" name="prenom" >

    <label >Nom :</label>
    <input type="textarea" name="nom" >
   
    <label >Date de Naissance :</label>
    <input type="date" name="dateNaissance" >

    <label >Sexe</label>
    <input type="text" name="sexe" >

    <label >Photo</label>
    <input type="varchar" name="photo"  placeholder="URL">

    <input type="submit" name="submit" value="Ajouter l'acteur">
</form>

<?php
$title = "Ajouter un acteur";
$secondary_title = "Ajouter un Acteur ";
$content = ob_get_clean();
require "view/template.php"
?>