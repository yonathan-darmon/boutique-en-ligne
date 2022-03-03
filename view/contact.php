<?php 
        /*$nom = htmlentities($_POST['nom']);
        $objet = htmlentities($_POST['objet']);
        $mail = htmlentities($_POST['mail']);
        $message = htmlentities($_POST['message']);
        $destinataire = 'aurelien.adjimi@laplateforme.io'; 
        $contenu = '<html><head><title> '.$objet.' </title></head><body>';
        $contenu = 'Nom: '.$nom.'';
        $contenu = '>Email: '.$mail.'';
        $contenu = 'Message: '.$message.'';
        $contenu = '</body></html>';
        $headers = 'MIME-Version: 1.0'."\r\n";
        $headers = 'Content-type: text/html; charset=iso-8859-1'."\r\n";*/
?>

<h1>Formulaire</h1>
    <form method="post" action="">
        <input type="text" name="nom" placeholder=" Nom" required/>
        <input type="email" name="mail" placeholder=" E-mail" required/>
        <input type="text" name="objet" placeholder=" Objet"/>
        <textarea name="message" placeholder=" Message" required></textarea>
        <input type="submit" name="send" value="Envoyer" />
    </form>
