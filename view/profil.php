<?php foreach ($reward as $value): ?>
    <div class="boite1">
        <div class="boite2">
            <p><?= $value['login'] ?> </p>
            <p> Votre mot de passe</p>
            <p><?= $value['adress'] ?></p>
            <p><?= $value['email'] ?></p>
        </div>
        <form action="" name="profil" method="post">
            <input type="submit" name="login" value="Changer le login">
            <input type="submit" name="password" value="Changer de password">
            <input type="submit" name="adresse" value="Changement d'adresse">
            <input type="submit" name="email" value="Changement d'adresse mail">
        </form>
    </div>

    <h2>Votre niveau de reward</h2>
    <h1><?= $value['name']; ?></h1>
<?php endforeach; ?>
