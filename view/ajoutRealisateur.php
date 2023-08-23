<?php
ob_start();
?>
<p class= "titre"><strong>Ajoutez un Réalisateur</strong></p>
<form action="index.php?action=ajoutRealisateur" method="post">

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

    <input type="submit" name="submit" value="Ajouter le Réalisateur">
</form>

<?php
$title = "Ajouter un Réalisateur";
$secondary_title = "Ajouter un Réalisateur ";
$content = ob_get_clean();
require "view/template.php"
?>