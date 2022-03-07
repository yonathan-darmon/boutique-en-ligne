<h1>Modifier votre <?=$params?></h1>
<form action="#" name="modif" method="post">
    <?php
    if (!empty($error)){
        echo $error[0];
    }
    elseif (!empty($success)){
        echo $success[0];
    } ?>
    <input type="text" name="<?=$params?>" placeholder="<?php if($params!='password'){ echo $utilisateur[0];}else{echo 'modifiez votre password';}?>">
    <?php

    if ($params=='password'){
        echo '<input type="password" name="verifypassword" placeholder="verification password">';
    }
    ?>
    <input type="submit" name="modif" value="Modifier">
</form>
