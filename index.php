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
    }
}
else{
    $ctrlCinema->listFilms();
    $ctrlCinema->listActeurs();
    $ctrlCinema->listRealisateurs();
    $ctrlCinema->listGenres();
    $ctrlCinema->listRoles();
};