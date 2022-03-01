<?php
var_dump($params);
var_dump($utilisateur);
var_dump($_POST);
?>
<h1>Modifier votre <?=$params?></h1>
<form action="#" name="modif" method="post">
    <input type="text" name="<?=$params?>" value="<?php if($params!='password'){ echo $utilisateur[0];}else{echo 'modifiez votre password';}?>">
    <?php
    if ($params=='password'){
        echo '<input type="text" name="verifypassword" placeholder="verification password">';
    }
    ?>
    <input type="submit" name="modif" value="Modifier">
</form>
