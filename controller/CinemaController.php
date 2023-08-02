<?php
namespace Controller;
use Model\Connect;

class CinemaController
{
    public function listFilms(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT titre, anneeSortie FROM film
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

    public function detailF ($id){
        $pdo = Connect ::seConnecter ();
        $requeteF = $pdo->prepare("select titre from film where id_film = :id");
        $requeteF->execute(["id"=>$id]);
        require "view/detailFilm.php";}   

    public function detailA ($id){
        $pdo = Connect ::seConnecter ();
        $requeteA = $pdo->prepare("SELECT nom, prenom FROM personne 
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        WHERE id_acteur =  :id");
        $requeteA->execute(["id"=>$id]);
        require "view/detailActeur.php";} 

    public function detailR ($id){
        $pdo = Connect ::seConnecter ();
        $requeteR = $pdo->prepare("SELECT nom, prenom FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne        
        WHERE id_realisateur =  :id"); 
        $requeteR->execute(["id"=>$id]);
        require "view/detailRealisateur.php";} 

    public function detailRole ($id){
        $pdo = Connect ::seConnecter ();
        $requeteRole = $pdo->prepare("SELECT nom, prenom FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne        
        WHERE id_realisateur =  :id"); 
        $requeteRole->execute(["id"=>$id]);
        require "view/detailRole.php";} 
              
}