<?php foreach ($utilisateur as $value): ?>
<img class="image" src="<?=path?>ASSET/images/5111rgoIUOS._AC_SY550_.jpg" alt="figurine saint Seyia">
<div class="boite1">
    <div class="value">
        <p><?= $value['login'] ?> </p>
        <p> Votre mot de passe</p>
        <p><?= $value['adresse'] ?></p>
        <p><?= $value['email'] ?></p>
    </div>
    <?php endforeach; ?>

    <div class="link">
        <a href="<?= path ?>profil/login">Modifiez votre login</a>
        <a href="<?= path ?>profil/password">Modifiez votre mot de passe</a>
        <a href="<?= path ?>profil/adresse">Modifiez votre adresse</a>
        <a href="<?= path ?>profil/email">Modifiez votre emaiil</a>
        <a href="<?= path ?>profil/historique_des_commandes">Historique des commandes</a>

    </div>

</div>
<div class="reward">
    <h2>Votre niveau de reward</h2>
    <h1 class="metal"><?= $reward['name']; ?></h1>
</div>