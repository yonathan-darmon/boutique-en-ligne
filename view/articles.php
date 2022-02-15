<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Liste des produits</h1>
<?php foreach($produits as $value):?>
    <h2><a href="article.php?<?=$value['id']?>"><?= $value['name'];?></a></h2>
<h3><?= $value['price'];?> euros</h3>
<?php endforeach;?>
</body>
</html>