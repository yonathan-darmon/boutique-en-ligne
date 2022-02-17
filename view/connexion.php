<?php
if(isset($_POST['connect'])){
    $user=new Utilisateurs();
    $connect=$user->connect($_POST['login'], $_POST['password']);
    if(!empty($connect)){
        echo $connect;
    }
}
?>
<form action="#" method="post" >
    <input type="text" name="login">
    <input type="text" name="password">
    <input type="submit" value="se connecter" name="connect">
</form>