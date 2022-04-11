<?php
if(empty($historique)):; // Vérifie les commandes
?>
<h1>Vous n'avez pas encore de commandes</h1>
<?php else:?>
    <h1>Commandes</h1>
<table>
    <thead>
    <tr>
    <?php foreach ($historique[0] as $key => $value):?> <!-- Affiche l'historique de commande -->
    <th> <?=$key;?> </th>
    <?php endforeach;?>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($historique as $key =>$value):?>
<tr>
    <?php foreach ($value as $value2):?>
    <td>
        <?=$value2?>
    </td>
    <?php endforeach;?>

</tr>
    <?php endforeach;?>
    </tbody>
</table>


<?php endif;?>

