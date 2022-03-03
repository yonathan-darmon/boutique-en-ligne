<?php
var_dump($historique);
if(empty($historique)):;
?>
<h1>Vous n'avez pas encore de commandes</h1>
<?php else:?>
    <h1>Commandes</h1>
<table>
    <thead>
    <th>
    <?php foreach ($historique[0] as $key => $value):?>
    <tr> <?=$key;?> </tr>
    <?php endforeach;?>

    </th>
    </thead>
    <tbody>
    <?php foreach ($historique as $key =>$value):?>

    <?php endforeach;?>
    </tbody>
</table>


<?php endif;?>

