<?php var_dump($_POST);
if(isset($error1)):?>
    <div class="error"><?=$error1?></div>
<?php endif;?>
<?php if(!empty($success)):?>
<div class="reussi"><?=$success[0]?></div>
<?php else:?>
<form action="#" method="post">
    <label for="login">Login</label>
    <input type="text" name="login">
    <label for="password">Password</label>
    <input type="password" name="password">
    <label for="passwordverify">Verification du mot de passe</label>
    <input type="password" name="passwordverify">
    <label for="email">Email</label>
    <input type="text" name="email">
    <p>Adresse</p>
    <label for="numero">Numero de rue</label>
    <input type="number" name="numero">
    <label for="nom">Nom de votre voie</label>
    <input type="text" name="nom">
    <label for="codepostal">Votre Code Postal</label>
    <input type="number" name="codepostal">
    <label for="ville">Ville</label>
    <input type="text" name="ville">
    <label for="valider">Valider vos données</label>
    <input type="submit" value="s'inscrire" name="valider">
</form>
<?php endif;?>

