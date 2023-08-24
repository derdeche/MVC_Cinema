<?php
ob_start();
?>
<p class= "titre"><strong>Ajoutez un Genre</strong></p>

<form action="index.php?action=ajoutGenre" method="post">
   
        
    <input type ='text' name='genre' placeholder= "Nom du Genre"></input>
        
    <input type="submit" name="submit" value="Ajouter"></input>
     
</form>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$content = ob_get_clean();
require "view/template.php";

?>