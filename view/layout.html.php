<?php
$params = explode('/', $_GET['p']);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?=path?>ASSET/css/<?php if (isset($params[0])){ echo $params[0];}else{echo 'page-accueil';}?>.css" >
    <link rel="stylesheet" href="<?=path?>ASSET/css/header.css">
    <link rel="stylesheet" href="<?=path?>ASSET/css/footer.css">
    <title></title>
</head>
<body>
<!-- Header -->
<header>
        <nav>
    <div id="container">
            <ul class="menu">
                <li><a href="">Menu</a>
                    <ul class="submenu">
                        <li><a href="<?=path?>">Accueil</a></li>
                        <li><a href="<?=path?>connexion">Connexion</a></li>
                        <li><a href="<?=path?>inscription">Inscription</a></li>
                        <li><a href="<?=path?>profil">Profil</a></li>
                        <li><a href="<?=path?>produits">Shop</a></li>
                        <li><a href="<?=path?>">Qui sommes-nous ?</a></li>
                        <li><a href="<?=path?>">Nous contacter</a></li>
                    </ul>
                    </li>
            </ul>
            <div class="image"><img src="<?=path?>ASSET/images/culte-ure.png" onmouseover="this.src='<?=path?>ASSET/images/culte-ure-hover.png';" onmouseout="this.src='<?=path?>ASSET/images/culte-ure.png';"></img></div>
            <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
            <a href=""><i class="fa-solid fa-user"></i></a>
            <a href=""><i class="fa-solid fa-basket-shopping"></i></a>
            </div>
        </nav>
    </header>

    <main>
        <?=$content?>
        
    </main>

      <!-- Footer -->

<footer>
    <div id="footer">
        <div class="contact">
            <h1>Nous contacter</h1>
                <a href=""><i class="fa-solid fa-envelope"></i></a>
                <a href=""><i class="fa-solid fa-phone"></i></a>
                <a href=""><i class="fa-brands fa-github"></i></a><br>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-facebook"></i></a>    
                <a href=""><i class="fa-brands fa-twitter"></i></a>
        </div>

        <div class="savoir">
            <h1>En savoir plus</h1>
                <a href="">Qui sommes-nous ?</a>
                <a href="">Mentions légales</a>
                <a href="">FAQ</a>
        </div>

        <div class="logo"><img src="<?=path?>ASSET/images/culte-ure.png" onmouseover="this.src='<?=path?>ASSET/images/culte-ure-hover.png';" onmouseout="this.src='<?=path?>ASSET/images/culte-ure.png';"></img></div>

    </div>
</footer>
    
</body>
</html>