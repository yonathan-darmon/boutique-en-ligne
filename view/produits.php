<div class="box1">
    <div class="categorie"><a href="articles.php?cat=disney">Disney</a></div>
    <div class="categorie"><a href="articles.php?cat=hp">Harry Potter</a></div>
    <div class="categorie"><a href="articles.php?cat=marvel">Marvel</a></div>
    <div class="categorie"><a href="articles.php?cat=sw">Star Wars</a></div>
    <div class="categorie"><a href="articles.php?cat=dc">DC Universe</a></div>
</div>
<h1>Liste des produits</h1>

<?php foreach($produits as $value):?>
    <h2><a href="article.php?<?=$value['id']?>"><?= $value['name'];?></a></h2>
<h3><?= $value['price'];?> euros</h3>
<?php endforeach;?>
