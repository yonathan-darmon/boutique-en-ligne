<?php

use PHPMailer\PHPMailer\PHPMailer;

class Contact extends Controller {
    public function __construct()
    {

    }

    public static function index()
    {
        $php = new PHPMailer();

        if(isset($_POST['send'])) {
        $nom = htmlentities($_POST['nom']);
        $objet = htmlentities($_POST['objet']);
        $email = htmlentities($_POST['mail']);
        $message = htmlentities($_POST['message']);
    
        try{
            $php -> isSMTP();
            $php -> Host = 'smtp.gmail.com';
            $php -> SMTPAuth = true;
            $php -> Username = 'aurelien.adjimi@laplateforme.io';
            $php -> Password = 'Ekqd9m9q2asi';
            $php -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $php -> Port = '587';
    
            $php -> setFrom('aurelien.adjimi@laplateforme.io');
            $php -> addAddress('aurelien.adjimi@laplateforme.io');
    
            $php -> isHTML(true);
            $php -> Subject = 'Message reçu (Contact page)';
            $php -> Body = '<h3>Name: $nom <br>Email: $email <br>Message: $message</h3>';
    
            $php -> Send();
            $alert = 'Message envoyé';
        } catch (Exception $e){
            $alert = 'Oups, envoyer à nouveau !';
        }
    }

       /* $nom = htmlentities($_POST['nom']);
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
        $headers = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $retour = mail('aurleien.adjimi@laplateforme.io', 'Envoi depuis la page contact',  $_POST['message'], ''); 
        if($retour)
        echo '<div class="erreur"><p>Message envoyé</p></div>';*/
    }
}
    ?>