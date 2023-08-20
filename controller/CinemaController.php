<?php
namespace Controller;
use Model\Connect;

class CinemaController
{
    public function listFilms(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT titre, anneeSortie, affiche FROM film
        ");
        require "view/listFilms.php";}

    /*$realisateur = $pdo->query("
    SELECT id_realisateur FROM realisateur
    ");*/

    public function listActeurs(){
        $pdo = Connect::seConnecter();
        $requeteA = $pdo->query("
        SELECT nom, prenom FROM personne
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        ORDER BY id_acteur
        ");
        require "view/listActeurs.php";}

    public function listRealisateurs(){
        $pdo = Connect::seConnecter();
        $requeteR = $pdo->query("
        SELECT nom, prenom FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
        ORDER BY id_realisateur
        ");
        require "view/listRealisateurs.php";}

    public function listGenres(){
        $pdo = Connect::seConnecter();
        $requeteG = $pdo->query("
        SELECT genre FROM genre
        ");
        require "view/listGenres.php";}

    public function listRoles(){
        $pdo = Connect::seConnecter();
        $requeteR = $pdo->query("
        SELECT role FROM role
        ");
        require "view/listRoles.php";}

    public function detailFilm ($id){
        $pdo = Connect ::seConnecter ();
        $requeteF = $pdo->prepare("select titre from film where id_film = :id");
        $requeteF->execute(["id"=>$id]);
        require "view/detailFilm.php";}   

    public function detailActeur ($id){
        $pdo = Connect ::seConnecter ();
        $requeteA = $pdo->prepare("SELECT nom, prenom FROM personne 
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        WHERE id_acteur =  :id");
        $requeteA->execute(["id"=>$id]);
        require "view/detailActeur.php";} 

    public function detailRealisateur ($id){
        $pdo = Connect ::seConnecter ();
        $requeteR = $pdo->prepare("SELECT nom, prenom FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne        
        WHERE id_realisateur =  :id"); 
        $requeteR->execute(["id"=>$id]);
        require "view/detailRealisateur.php";} 

    public function detailRole ($id){
        $pdo = Connect ::seConnecter ();
        $requeteRole = $pdo->prepare("SELECT titre FROM film
        INNER JOIN jouer ON film.id_film = jouer.id_film        
        WHERE id_role =  :id"); 
        $requeteRole->execute(["id"=>$id]);
        require "view/detailRole.php";} 

    public function detailGenre ($id){
        $pdo = Connect ::seConnecter ();
        $requeteGenre = $pdo->prepare("SELECT titre FROM film
        INNER JOIN action ON film.id_film = action.id_film     
        WHERE id_genre =  :id"); 
        $requeteGenre->execute(["id"=>$id]);
        require "view/detailGenre.php";} 

    /*public function ajoutFilm (){
        if(isset($_post["submit"])){
            $titre = "titre";
            $anneeSortie = "anneeSortie";
            $duree = "duree";
            $synopsis = "synopsis";
            $note = "affiche";}}*/

            public function ajoutGenre(){
            if(isset($_POST['submit'])){

                // var_dump($_POST);die;    
                $pdo = connect::seConnecter(); 
                $requeteAjoutGenre= $pdo->prepare("
                INSERT INTO genre (genre)
                VALUES (:nomGenre)"
                );
                $requeteAjoutGenre->execute(['nomGenre' => $_POST['nomGenre']]);
                $newId = $pdo->lastInsertId();
                header("Location:index.php?action=detailGenre&id=".$newId);
                die;
            }
                require "view/ajoutGenre.php";
                           
        }

        public function ajoutRole (){
            if(isset($_POST['submit'])){
                $pdo = connect::seConnecter();
                $requeteAjoutRole= $pdo->prepare("
                INSERT INTO role (role)
                VALUES (:nomRole)"
                );
                $requeteAjoutRole->execute(['nomRole' => $_POST['nomRole']]);
                $newId = $pdo->lastInsertId();
                header("Location:index.php?action=detailRole&id=".$newId);
                die;

            }
                require "view/ajoutRole.php";
        
        }       
          
}