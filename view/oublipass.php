<?php if (!empty($error)): ?>
    <p class="error1"><?= $error[0]?></p>
<?php endif;?>
<?php if (!empty($success)): ?>
    <p class="success"><?= $success[0] ?></p>
<?php endif; ?>
<form action="#" method="post" name="forget">
    <label for="email">Veuillez entrer votre email</label>
    <input type="email" name="email" placeholder="Votre email">
    <input type="submit" name="reset">
</form>
