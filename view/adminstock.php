<h1>Visualisation des stocks</h1>
<table>
        <tr>
            <th>ID</th>
            <th>Nom du produit</th>
            <th>Quantité</th>
        </tr>
            <?php foreach($rendstock as $value):?>
                <tr>
            <td><?=$value['id']?></td>
            <td><?=$value['name']?></td>
            <td><?=$value['stock']?></td>
            <td><a href="<?=path?>admin/stock/<?=$value['id']?>">modifier le stock</a></td>
            <?php endforeach;?>
        </tr>
</table>
