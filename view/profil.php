<?php foreach ($reward as $value): ?>
    <div class="boite1">
        <div class="value">
            <p><?= $value['login'] ?> </p>
            <p> Votre mot de passe</p>
            <p><?= $value['adresse'] ?></p>
            <p><?= $value['email'] ?></p>
        </div>

        <div class="link">
            <a href="<?= path ?>profil/login">Modifiez votre login</a>
            <a href="<?= path ?>profil/password">Modifiez votre mot de passe</a>
            <a href="<?= path ?>profil/adresse">Modifiez votre adresse</a>
            <a href="<?= path ?>profil/email">Modifiez votre emaiil</a>
        </div>
    </div>

    <h2>Votre niveau de reward</h2>
    <h1><?= $value['name']; ?></h1>
<?php endforeach; ?>
