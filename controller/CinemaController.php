<?php
namespace Controller;
use Model\Connect;

class CinemaController
{
    public function listFilms(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT id_film, titre, anneeSortie, affiche FROM film
        ");
        require "view/listFilms.php";}

    /*$realisateur = $pdo->query("
    SELECT id_realisateur FROM realisateur
    ");*/

    public function listActeurs(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("     
        SELECT  id_acteur, nom, prenom, DATE_FORMAT(dateNaissance, '%d-%m-%Y') AS date, photo
        FROM personne
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne               
        ");
        require "view/listActeurs.php";}

    public function listRealisateurs(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT id_realisateur, nom, prenom, DATE_FORMAT(dateNaissance, '%d-%m-%Y') AS date, photo FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
        
        ");
        require "view/listRealisateurs.php";}

    public function listGenres(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT id_genre,genre FROM genre
        ");
        require "view/listGenres.php";}

    public function listRoles(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT id_role,role FROM role
        ");
        require "view/listRoles.php";}

    public function listCastings()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT jouer.id_acteur ,jouer.id_film, jouer.id_role, nom, prenom, role, titre FROM jouer
        INNER JOIN role ON jouer.id_role = role.id_role
        INNER JOIN film ON jouer.id_film = film.id_film
        INNER JOIN acteur ON jouer.id_acteur = acteur.id_acteur
        INNER JOIN personne ON acteur.id_personne = personne.id_personne            
              
       ");
        
        require "view/listCastings.php";
    }

    public function detailFilm ($id){
        $pdo = Connect ::seConnecter ();
        $requete = $pdo->prepare("select titre from film where id_film = :id");
        $requete->execute(["id"=>$id]);
        require "view/detailFilm.php";}  

    // public function detailActeur ($id){
        // $pdo = Connect ::seConnecter ();
        // $requete = $pdo->prepare("SELECT nom, prenom FROM personne 
        // INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        // WHERE id_acteur =  :id");
    //  $requete->execute(["id"=>$id]);
    // require "view/detailActeur.php";} 

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

    public function ajoutActeur()
	{
		if (isset($_POST["submit"]))
           {
            $date = filter_input(INPUT_POST, "dateNaissance", FILTER_SANITIZE_SPECIAL_CHARS);
			$prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS);
			$nom=  filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS);
            $sexe=  filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_SPECIAL_CHARS);
            $photo = filter_input(INPUT_POST, "photo", FILTER_SANITIZE_SPECIAL_CHARS);
					
			if ($prenom && $nom && $date && $sexe && $photo) {
				$pdo = Connect::seConnecter();
				$stmt = $pdo->prepare
                ("
				INSERT INTO personne (prenom, nom, dateNaissance,sexe, photo)
				VALUES (:prenom, :nom,:dateSQL, :sexe, :photo)
				");

				$stmt->execute(["prenom" => $prenom, "nom" => $nom,"dateSQL" => $date, "sexe"=>$sexe, "photo"=>$photo]);

            $newIdPersonne = $pdo->lastInsertId();

            $requete = $pdo->prepare("INSERT INTO acteur (id_personne)

            VALUES (:idPersonne)");

            $requete->execute(['idPersonne' => $newIdPersonne ]);

            // header("Location:index.php?action=listActeurs&id=" . $newIdPersonne);

				header('location:index.php?action=listActeurs');
				 die();
			}
		}
		require "view/ajoutActeur.php";
	}

    public function ajoutRealisateur()
	{
		if (isset($_POST["submit"]))
           {
            $date = filter_input(INPUT_POST, "dateNaissance", FILTER_SANITIZE_SPECIAL_CHARS);
			$prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS);
			$nom=  filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS);
            $sexe=  filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_SPECIAL_CHARS);
            $photo = filter_input(INPUT_POST, "photo", FILTER_SANITIZE_SPECIAL_CHARS);
					
			if ($prenom && $nom && $date && $sexe && $photo)
            {
				$pdo = Connect::seConnecter();
				$stmt = $pdo->prepare
                ("
				INSERT INTO personne (prenom, nom, dateNaissance, sexe, photo)
				VALUES (:prenom, :nom,:date, :sexe, :photo)
				");

				$stmt->execute(["prenom" => $prenom, "nom" => $nom,"date" => $date, "sexe"=>$date, "photo"=>$photo]);

            $newIdRealisateur = $pdo->lastInsertId();

            $requete = $pdo->prepare("INSERT INTO realisateur (id_personne)

            VALUES (:idRealisateur)");

            $requete->execute(['idRealisateur' => $newIdRealisateur ]);
    

				header('location:index.php?action=listRealisateurs');
				
			}
		}
		require "view/ajoutRealisateur.php";
	}

    public function ajouFilm()
	{
		$pdo = Connect::seConnecter();

		$requete = $pdo->query
            ("
			SELECT id_genre, genre
			FROM genre 
			");
		
		$requete = $pdo->query
        ("
		SELECT CONCAT(prenom, ' ',nom) AS nomprenom , id_realisateur
		FROM director
		");

		
		if (isset($_POST["submit"])) {
			
			$titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_SPECIAL_CHARS);
			$anneeSortie = filter_input(INPUT_POST, "anneeSortie", FILTER_SANITIZE_NUMBER_INT);
			$duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_NUMBER_INT);
			$synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_SPECIAL_CHARS);
			$affiche = filter_input(INPUT_POST, "affiche", FILTER_SANITIZE_SPECIAL_CHARS);
            $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_INT);
			$genre = filter_input(INPUT_POST, "id_genre", FILTER_SANITIZE_NUMBER_INT);
			$realisateur = filter_input(INPUT_POST, "id_realisateur", FILTER_SANITIZE_NUMBER_INT);


			
			if ($titre && $anneeSortie && $duree && $synopsis && $affiche && $note && $genre && $id_realisateur) {
				$pdo = Connect::connectToDb();
			
				$stmt = $pdo->prepare
                ("
				INSERT INTO film (titre, anneeSortie, duree, synopsis,affiche, note,id_genre, id_directeur)
				VALUES (:titre, :anneeSortie, :duree, :synopsis, :affiche, :note, :id_genre, :id_realisateur)	
				");

				$stmt->execute
                ([
					"titre" => $titre, "anneeSortie" => $anneeSortie, "duree" => $duree, "synopsis" => $synopsis, "affiche" => $affiche, "note" => $note, "id_genre" => $id_genre, "id_realisateur" => $id_realisateur
				]);

				header('Location: index.php?action=listFilms');
				die();
			}
		}
		require "view/ajoutFilm.php";
	}

    /*public function detailFilm($id_film)
	{
		
		$pdo = Connect::seConnecter();
		$film = "$id_film";
		$requete= $pdo->prepare("
			SELECT id_realisateur, titre, anneSortie, duree, synopsis, genre, nom, prenom, note, affiche
			FROM  film
			INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
			INNER JOIN genre ON action.id_genre = genre.genre_id
			WHERE  film.id_film = :id_film
    	");
		
		$requete->execute(["id_film" => $film]);

        require "view/detailFilm.php";
	}*/

    public function detailActeur($id_acteur)
	{
		$pdo = Connect::seConnecter();

		$nom = "$id_acteur";

		$requete = $pdo->prepare("
			SELECT id_acteur, nom, prenom, DATE_FORMAT(dateNaissance, '%d/%m/%Y') AS date
			FROM ateur 
			WHERE id_acteur = :id_acteur

		");

		$requete->execute(["id_acteur" => $id_acteur]);

		$pdo = Connect::seConnecter();

		$name = "$id_acteur";

		$requete = $pdo->prepare("
			SELECT id_acteur,id_film, titre, anneeSortie, role 
			FROM acteur
			

		");

		$requete->execute(["id_acteur" => $id_acteur]);


		require "view/detailActeur.php";
	}

          
}