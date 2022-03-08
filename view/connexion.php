<?php if(!empty($success)):?>
    <div class="success"><?=$success[0];?></:></div>
<?php elseif (!empty($errors)):?>
    <div class="errors"><?= $errors[0];?></div>
<?php endif;?>
<form action="./connexion" method="post" >
    <input type="text" name="login">
    <input type="password" name="password">
    <input type="submit" value="se connecter" name="connect">
    <a href="<?=path?>oubli"> Mot de passe oublié</a>
</form>
