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
        $requete = $pdo->prepare("SELECT titre, anneeSortie, duree, synopsis, note, affiche  FROM film 
        where id_film = :id");
        $requete->execute(["id"=>$id]);
        require "view/detailFilm.php";} 
 

    public function detailActeur ($id){
        $pdo = Connect ::seConnecter ();
        $requete = $pdo->prepare("SELECT id_acteur, nom, prenom ,dateNaissance , photo FROM personne 
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
        $requete = $pdo->prepare("SELECT titre, affiche FROM film
        INNER JOIN action ON film.id_film = action.id_film     
        WHERE id_genre =  :id"); 
        $requete->execute(["id"=>$id]);
        require "view/detailGenre.php";} 

        public function Ajout()
    {
        require "view/listAjout.php";
    }

    

    public function ajoutFilm()
	{
		$pdo = Connect::seConnecter();

		$requete = $pdo->query("
			SELECT id_genre, genre
			FROM genre 
			");

        $requeteR = $pdo->query("
            SELECT id_realisateur, nom, prenom FROM personne
            INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
        
		    ");
		
			
		if (isset($_POST["submit"])) {
			
			$titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_SPECIAL_CHARS);
			$anneeSortie = filter_input(INPUT_POST, "anneeSortie", FILTER_SANITIZE_NUMBER_INT);
			$duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_NUMBER_INT);
			$synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_SPECIAL_CHARS);
			$affiche = filter_input(INPUT_POST, "affiche", FILTER_SANITIZE_SPECIAL_CHARS);
            $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_INT);
			$id_genre = filter_input(INPUT_POST, "id_genre", FILTER_SANITIZE_NUMBER_INT);
			$id_realisateur = filter_input(INPUT_POST, "id_realisateur", FILTER_SANITIZE_NUMBER_INT);


			
			if ($titre && $anneeSortie && $duree && $synopsis && $affiche && $note && $id_genre && $id_realisateur) {
				$pdo = Connect::seConnecter();
			
				$stmt = $pdo->prepare
                ("
				INSERT INTO film (titre, anneeSortie, duree, synopsis,affiche, note,id_genre, id_realisateur)
				VALUES (:titre, :anneeSortie, :duree, :synopsis, :affiche, :note, :id_genre, :id_realisateur)	
				");

				$stmt->execute
                ([
					"titre" => $titre, "anneeSortie" => $anneeSortie, "duree" => $duree, "synopsis" => $synopsis, "affiche" => $affiche, "note" => $note, "id_genre" => $id_genre, "id_realisateur" => $id_realisateur
				]);

				
                $newIdFilm = $pdo->lastInsertId();
                
                $requete = $pdo->prepare("INSERT INTO film (id_personne)
    
                VALUES (:idFilm)");
    
                $requete->execute(['idFilm' => $newIdFilm ]);
    
                header('Location: index.php?action=listFilms');
                   
                    
			}
		    }
		        require "view/ajoutFilm.php";
	}

    public function ajoutGenre(){
    if(isset($_POST['submit'])){

            
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

    public function ajoutCasting (){
        $pdo = Connect::seConnecter();
		
        $requeteActeur = $pdo->query("
		SELECT nom, prenom, id_acteur  FROM personne
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        ");

		$requeteRole = $pdo->query("
        SELECT id_role, role FROM role 
        ");

        $requeteFilm = $pdo->query("
		SELECT id_film, titre FROM film
        
        ");

        if (isset($_POST["submit"]))
        {
        $id_film = filter_input(INPUT_POST, "id_film", FILTER_SANITIZE_SPECIAL_CHARS);
        $id_role = filter_input(INPUT_POST, "id_role", FILTER_SANITIZE_SPECIAL_CHARS);
        $id_acteur=  filter_input(INPUT_POST, "id_acteur", FILTER_SANITIZE_SPECIAL_CHARS);
    //    var_dump($_POST);die;
                
        if ($id_film && $id_role && $id_acteur )
        {
            $pdo = Connect::seConnecter();
            $stmt = $pdo->prepare
            ("
            INSERT INTO jouer (id_film, id_role, id_acteur)
            VALUES (:id_FILM, :id_ROLE, :id_ACTEUR)
            ");

            $stmt->execute(["id_FILM" => $id_film, "id_ROLE" => $id_role, "id_ACTEUR" => $id_acteur]);
            

        header('location:index.php?action=listCastings');
            
        }
        }
       
        require "view/ajoutCasting.php";
        
    }
     
   

          
}