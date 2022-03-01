<?php
var_dump($params);
var_dump($utilisateur);
var_dump($_POST);
?>
<h1>Modifier votre <?=$params?></h1>
<form action="#" name="modif" method="post">
    <input type="text" name="<?=$params?>" value="<?=$utilisateur[0]?>">
    <input type="submit" name="modif" value="Modifier">
</form>
