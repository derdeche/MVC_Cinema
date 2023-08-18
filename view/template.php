<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="public/style.css">
    <title>Document</title>
</head>
<body class ='fond'>
    <!-- header -->
    
<div class='header' >
                <h1><strong>AllMovies</strong></h1>
                    <nav>
                        <ul>
                            <li><a href="index.php?action=listFilms"><button class="button1"><strong>Films</strong></button></a></li>
                            <li><a href="index.php?action=listActeurs"><button class="button1"><strong>Acteurs</strong></button></a></li>
                            <li><a href="index.php?action=listRéalisateurs"><button class="button1"><strong>Réalisateurs</strong></button></a></li>
                            <li><a href="index.php?action=listGenres"><button class="button1"><strong>Genres</strong></button></a></li>
                            <li><a href="index.php?action=listRôles"><button class="button1"><strong>Rôles</strong></button></a></li>
                            <li><a href="index.php?action=listCastings"><button class="button1"><strong>Castings</strong></button></a></li>
                            <li><a href="index.php?action=listAjout"><button class="button1"><strong>Ajout</strong></button></a></li>
                        </ul>
                    </nav>
                    
</div>

<?= $content?>
</body>
</html>