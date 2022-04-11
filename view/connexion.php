<?php if (!empty($success)): ?>
    <div class="success"><?= $success[0]; ?></:></div>
   <?php header('Refresh:3,' . path . 'accueil');?>

<?php elseif (!empty($errors)): ?>
    <div class="errors"><?= $errors[0]; ?></div>
<?php endif; ?>
<div class="box">
    <img class="imageconnect" src="<?= path ?>ASSET\images\Figurine-Funko-Pop-Rocks-Queen-Freddie-Mercury-Radio-Gaga-removebg-preview.png"
         alt="figurine pop">
    <div class="formconnect">
        <h1>Connexion</h1>
        <form action="" method="post">
            <label for="login">Votre Login</label>
            <input type="text" name="login">
            <label for="password">Votre Mot de passe</label>
            <input type="password" name="password">
            <input id="connect" type="submit" value="Se connecter" name="connect">
            <a href="<?= path ?>inscription">Pas encore inscrit? C'est par ici!</a>
            <a href="<?= path ?>oubli"> Mot de passe oublié</a>
        </form>
    </div>
</div>