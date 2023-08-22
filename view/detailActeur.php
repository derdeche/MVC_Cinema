<?php
ob_start();?>
<?php
    foreach ($requete->fetchAll() as $acteur) { ?>
        <div class="card-film">
            <div class="container-flex">
                    <div class="photo-acteur">
                    <a href="index.php?action=detailsActeur&id=<?= $acteur["id_acteur"] ?>">
                    <img src="<?= $actor["photo"] ?>" >
                    </a>
                </div>
                <div class="infos-acteur">
                    <p><?= $actor["nom"] . " " . $actor["prenom"] ?></p>
                    <p><?= $actor["dateNaissance"] ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
<?php






$content = ob_get_clean();

require "view/template.php";
    ?>