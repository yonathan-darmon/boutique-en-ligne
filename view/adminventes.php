<h1>Visualisation des ventes</h1>
<table>
<tr>
            <th>ID</th>
            <th>Nom du produit</th>
            <th>Quantité vendue</th>
            <th>Prix</th>
            <th>Moyen de paiement</th>
 </tr>
 <?php foreach ($produit as $value):?>
    <tr>
<td><?=$value['id']?></td>
<td><?=$value['product_name']?></td>
<td><?=$value['quantity']?></td>
<td><?=$value['prices']?></td>
<td><?=$value['moyen_de_paiement']?></td>
<td><?=$value['id_commande']?></td>
<td><?=$value['id_user']?></td>
    <?php endforeach;?>
    </tr>
</table>