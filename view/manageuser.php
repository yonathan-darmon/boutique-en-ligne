<?php foreach($utilis as $value)?>
<p><?=$value['id']?></p>
<h1><?=$value['login']?></h1>
<h2><?=$value['id_droit']?></h2>
<!-- var_dump($utilis);
var_dump($droit); -->

<form action="#" method="post" name="droit">
    <input type="text" name="droit">
    <input type="submit" name="modif">
</form>
