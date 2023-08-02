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

    
}