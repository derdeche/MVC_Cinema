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
        $requete = $pdo->query("     
        SELECT  nom, prenom, DATE_FORMAT(dateNaissance, '%d-%m-%Y') AS date, photo
        FROM personne
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne               
        ");
        require "view/listActeurs.php";}

    public function listRealisateurs(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom, prenom, DATE_FORMAT(dateNaissance, '%d-%m-%Y') AS date, photo FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
        
        ");
        require "view/listRealisateurs.php";}

    public function listGenres(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT genre FROM genre
        ");
        require "view/listGenres.php";}

    public function listRoles(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT role FROM role
        ");
        require "view/listRoles.php";}

    public function listCastings()
    {
        $pdo = Connect::seConnecter();
        $request = $pdo->query("
        SELECT nom, prenom, role, titre FROM jouer
        INNER JOIN personne ON jouer.id_acteur = personne.id_personne        
        INNER JOIN role ON jouer.id_role = role.id_role
        INNER JOIN film ON jouer.id_film = film.id_film
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        "
        );
        
        require "view/listCastings.php";
    }

    public function detailFilm ($id){
        $pdo = Connect ::seConnecter ();
        $requete = $pdo->prepare("select titre from film where id_film = :id");
        $requete->execute(["id"=>$id]);
        require "view/detailFilm.php";}   

    public function detailActeur ($id){
        $pdo = Connect ::seConnecter ();
        $requete = $pdo->prepare("SELECT nom, prenom FROM personne 
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        WHERE id_acteur =  :id");
        $requete->execute(["id"=>$id]);
        require "view/detailActeur.php";} 

    public function detailRealisateur ($id){
        $pdo = Connect ::seConnecter ();
        $requete = $pdo->prepare("SELECT nom, prenom FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne        
        WHERE id_realisateur =  :id"); 
        $requete->execute(["id"=>$id]);
        require "view/detailRealisateur.php";} 

    public function detailRole ($id){
        $pdo = Connect ::seConnecter ();
        $requete = $pdo->prepare("SELECT titre FROM film
        INNER JOIN jouer ON film.id_film = jouer.id_film        
        WHERE id_role =  :id"); 
        $requete->execute(["id"=>$id]);
        require "view/detailRole.php";} 

    public function detailGenre ($id){
        $pdo = Connect ::seConnecter ();
        $requete = $pdo->prepare("SELECT titre FROM film
        INNER JOIN action ON film.id_film = action.id_film     
        WHERE id_genre =  :id"); 
        $requete->execute(["id"=>$id]);
        require "view/detailGenre.php";} 

    public function ajoutFilm (){
        $pdo = Connect::seConnecter();
		
		$requete = $pdo->query("
			SELECT genre FROM genre 
			");

        $requete = $pdo->query("
		SELECT nom, prenom	FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
        GROUP BY id_realisateur

		");
        require "view/ajoutFilm.php";
    }

    public function ajoutGenre(){
    if(isset($_POST['submit'])){

        // var_dump($_POST);die;    
        $pdo = connect::seConnecter(); 
        $requete= $pdo->prepare("
        INSERT INTO genre (genre)
        VALUES (:nomGenre)"
        );
        $requete->execute(['nomGenre' => $_POST['nomGenre']]);
        $newId = $pdo->lastInsertId();
        header("Location:index.php?action=detailGenre&id=".$newId);
        die;
    }
        require "view/ajoutGenre.php";
                           
    }

    public function ajoutRole (){
        if(isset($_POST['submit'])){
            $pdo = connect::seConnecter();
            $requete= $pdo->prepare("
            INSERT INTO role (role)
            VALUES (:nomRole)"
            );
            $requete->execute(['nomRole' => $_POST['nomRole']]);
            $newId = $pdo->lastInsertId();
            header("Location:index.php?action=detailRole&id=".$newId);
            die;

        }
            require "view/ajoutRole.php";
    
    }       

    public function Ajout()
    {
        require "view/listAjout.php";
    }
          
}