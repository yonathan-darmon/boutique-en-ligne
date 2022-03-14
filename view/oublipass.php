<?php if (!empty($error)): ?>
    <p class="error1"><?= $error[0]?></p>
<?php endif;?>
<?php if (!empty($success)): ?>
    <p class="success"><?= $success[0] ?></p>
<?php endif; ?>
<h1 class="titre">Mot de passe oublié</h1>
<div class="box">
    <img src="<?=path?>ASSET/images/queen-elizabeth-2-royals-family-funko-pop-removebg-preview.png" alt="" class="imageoubli">
<form action="#" method="post" name="forget">
    <label for="email">Veuillez entrer votre email</label>
    <input type="email" name="email" placeholder="Votre email">
    <input id="reset" type="submit" name="reset">
</form>
</div>