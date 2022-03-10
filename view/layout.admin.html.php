<?php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=path?>ASSET/css/admin.css">
    <title>Document</title>
</head>
<body>
<header>

</header>
<main>
    <div class="boite">
        <div class="navside">
            <ul>
                <li><a href="<?=path?>admin/stock">Gestion des Stock</a></li>
                <li><a href="<?=path?>admin/user">Gestion des Utilisateurs</a></li>
                <li><a href="<?=path?>admin/article">Ajout d'article</a></li>
                <li><a href="<?=path?>admin/vente">Visualisation des ventes</a></li>
                <li><a href="<?=path?>admin/categorie">Gestion des catégories</a></li>
                <li><a href="<?=path?>accueil">Retour à l'accueil</a></li>
                <li><a href="<?=path?>deco">Deconnexion</a></li>
            </ul>

        </div>
        <div class="content">
            <?= $content ?>
        </div>
    </div>
</main>
<footer>

</footer>
</body>
</html>
