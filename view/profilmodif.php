<h1>Modifier votre <?= $params ?></h1>
<form action="#" name="modif" method="post">
    <?php

    if (!empty($error)) {
        echo '<p class="errors">'.$error[0].'</p>';
    } elseif (!empty($success)) {
        echo '<p class="success">'.$success[0].'</p>';
        header('Refresh:2,URL=profil');
    }
    if ($params != 'adresse') {
        ?>
        <input type="text" name="<?= $params ?>" placeholder="<?php if ($params != 'password') {
            echo $utilisateur[0];
        } else {
            echo 'modifiez votre password';
        } ?>">
        <?php

        if ($params == 'password') {
            echo '<input type="password" name="verifypassword" placeholder="verification password">';
        }
    }else{
    ?>
        <label for="numero">Numero de rue</label>
        <input type="number" name="numero" required>
        <label for="nom">Nom de votre voie</label>
        <input type="text" name="nom" required>
        <label for="codepostal">Votre Code Postal</label>
        <input type="number" name="codepostal" required>
        <label for="ville">Ville</label>
        <input type="text" name="ville" required>
    <?php }?>
    <input id="modif" type="submit" name="modif" value="Modifier">
</form>
<img src="<?= path ?>ASSET/images/it.png" alt="funko IT" class="imageit">
