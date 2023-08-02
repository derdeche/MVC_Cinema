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

    $realisateur = $pdo->query("
    SELECT id_realisateur FROM realisateur
    ");
    require "view/listFilms.php";}

    public function listActeurs(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom, prenom, dateNaissance FROM personne
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        ORDER BY id_acteur
        ");
        require "view/listActeurs.php";}
}