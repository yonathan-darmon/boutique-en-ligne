<?php
if(!empty($success)){
    echo $success[0];
}
if (!empty($errors)){
    echo $errors[0];
}
?>
<form action="./connexion" method="post" >
    <input type="text" name="login">
    <input type="password" name="password">
    <input type="submit" value="se connecter" name="connect">
</form>