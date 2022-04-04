
<?php foreach($addstock as $value):?>
<p><?=$value['id']?></p>
<h1><?=$value['name']?></h1>
<h2><?=$value['stock']?></h2>
<?php endforeach;?>
<form action="" method="POST">
<input type="number" name="num"></input>
<input type="submit" name="ad">
</form>