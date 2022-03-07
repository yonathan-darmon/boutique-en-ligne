<?php 

?>

<h1>Formulaire</h1>
    <form method="post" action="">
        <input type="text" name="nom" placeholder=" Nom" required/>
        <input type="email" name="mail" placeholder=" E-mail" required/>
        <input type="text" name="objet" placeholder=" Objet"/>
        <textarea name="message" placeholder=" Message" required></textarea>
        <input type="submit" name="send" value="Envoyer" />
    </form>
