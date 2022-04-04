<h1>Gérer les utilisateurs</h1>
<table>
<tr>
            <th>ID</th>
            <th>Login</th>
            <th>Password</th>
            <th>Email</th>
            <th>Adresse</th>
            <th>Reward</th>
            <th>Droits</th>
 </tr>
 <?php foreach ($utilisateur as $value):?>
    <tr>
<td><?=$value['id']?></td>
<td><?=$value['login']?></td>
<td><?=$value['password']?></td>
<td><?=$value['email']?></td>
<td><?=$value['adresse']?></td>
<td><?=$value['id_reward']?></td>
<td><?=$value['id_droit']?></td>
<td><a href="<?=path?>admin/user/<?=$value['id']?>">Gérer</a></td>
    <?php endforeach;?>
    </tr>
</table>
