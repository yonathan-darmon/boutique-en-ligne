<?php if (isset($error1)): ?>
    <div class="error"><?= $error1 ?></div>
<?php endif; ?>
<?php if (!empty($success)): ?>
    <div class="reussi"><?= $success[0] ?></div>
<?php header('Refresh:3;url='.path.'connexion');?>
<?php else: ?>
<h1 class="titre">Inscription</h1>
<div class="box">
    <form action="#" method="post">
        <label for="login">Login</label>
        <input type="text" name="login" placeholder="Votre login">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Votre mot de passe">
        <label for="passwordverify">Verification du mot de passe</label>
        <input type="password" name="passwordverify" placeholder="Votre mot de passe">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Votre email">
        <label for="numero">Numero de rue</label>
        <input type="number" name="numero" placeholder="Numero de voie">
        <label for="nom">Nom de votre voie</label>
        <input type="text" name="nom" placeholder="Nom de votre voie">
        <label for="codepostal">Votre Code Postal</label>
        <input type="number" name="codepostal" placeholder="Votre Code postal">
        <label for="ville">Ville</label>
        <input type="text" name="ville" placeholder="Votre Ville">
        <input type="submit" value="S'inscrire" name="valider" id="valider">
        <a href="<?=path?>connexion">Déjà Membre?Connectez vous!</a>
    </form>
    <img class="imageinscri" src="<?=path?>ASSET/images/lapin-removebg-preview.png" alt="">
</div>
<?php endif; ?>

