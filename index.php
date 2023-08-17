<?php
use Controller\CinemaController;

spl_autoload_register(function ($class_name)
{
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
if(isset($_GET["action"])){
    switch ($_GET["action"])
    {
        case"listFilms" : $ctrlCinema->listFilms();break;
        case"listActeurs" : $ctrlCinema->listActeurs();break;
        case"listRealisateurs" :$ctrlCinema->listRealisateurs();break;
        case "listGenres" :$ctrlCinema->listGenres();break;
        case"listRoles" :$ctrlCinema->listRoles();break;
        case "detailFilm":$ctrlCinema->detailFilm($id);break;
        case "detailActeur":$ctrlCinema->detailActeur($id);break;
        case "detailRealisateur":$ctrlCinema->detailRealisateur($id);break;
        case "detailGenre":$ctrlCinema->detailGenre($id);break;
        case "detailRole":$ctrlCinema->detailRole($id);break;
        case "ajoutGenre" :$ctrlCinema->ajoutGenre();break;
        case "ajoutRole":$ctrlCinema->ajoutRole();break;
    }
}

    else{
        $ctrlCinema->listFilms();
        $ctrlCinema->listActeurs();
        $ctrlCinema->listRealisateurs();
        $ctrlCinema->listGenres();
        $ctrlCinema->listRoles();
        $ctrlCinema->detailA($id);
        $ctrlCinema->detailF($id);
        $ctrlCinema->detailR($id);
        $ctrlCinema->detailGenre($id);
        $ctrlCinema->detailRole($id);
        $ctrlCinema->ajoutGenre();
        $ctrlCinema->ajoutRole();
};