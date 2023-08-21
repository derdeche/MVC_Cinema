<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/style.css">
    <title>Document</title>
</head>
<body class ='fond'>
<div class="arrow-btn">
        <a href="#"><span class="fas fa-arrow-up"></span></a>
</div>
    <!-- header -->
    
<div class='header' >
                <h1><strong>AllMovies</strong></h1>
                    <nav>
                        <ul>
                            <li><a href="index.php?action=listFilms"><button class="button1"><strong>Films</strong></button></a></li>
                            <li><a href="index.php?action=listActeurs"><button class="button1"><strong>Acteurs</strong></button></a></li>
                            <li><a href="index.php?action=listRealisateurs"><button class="button1"><strong>Réalisateurs</strong></button></a></li>
                            <li><a href="index.php?action=listGenres"><button class="button1"><strong>Genres</strong></button></a></li>
                            <li><a href="index.php?action=listRoles"><button class="button1"><strong>Rôles</strong></button></a></li>
                            <li><a href="index.php?action=listCastings"><button class="button1"><strong>Castings</strong></button></a></li>
                            <li><a href="index.php?action=listAjout"><button class="button1"><strong>Ajout</strong></button></a></li>
                        </ul>
                    </nav>
                    
</div>

<?= $content?>
</body>
</html>