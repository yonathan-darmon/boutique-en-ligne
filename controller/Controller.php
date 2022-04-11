<?php

use PHPMailer\PHPMailer\PHPMailer; // Fait appel à PHPMailer

class Controller
{

    public $path = "/boutique_en_ligne/";

    public function __construct()
    {
    }

    public function loadModel(string $model) // Paramètre les models

    {
        $this->$model = new $model();
    }

    public static function render($fichier, $data = []) // Paramètre le render pour les view
    {
        extract($data);
        ob_start();
        require_once(ROOT . 'view/' . $fichier . '.php');
        $content = ob_get_clean();
        require_once(ROOT . 'view/layout.html.php');
    }

    public static function sendmail()
    {
        if (isset($_POST['send'])) {
            $mail = new PHPMailer(); //Instancie PHPMailer
            $mail->isSMTP(); //Dis à PHPMailer d'utiliser SMTP

            //Enable SMTP debugging
            //SMTP::DEBUG_OFF = off (for production use)
            //SMTP::DEBUG_CLIENT = client messages
            //SMTP::DEBUG_SERVER = client and server messages
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

            //Paramètres du serveur
            $mail->Mailer = 'smtp';
            $mail->Host = 'smtp.gmail.com';


            //Paramètre le numéro de port SMTP: 587 pour SMTP+STARTTLS
            $mail->Port = 587;

            //Paramètre le méchanisme d'encryptage: STARTTLS
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            //Authentification SMTP
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            //Adresse mail à utiliser pour SMTP
            $mail->Username = 'pop.cult.e.ure.boutique@gmail.com';

            //Mot de passe à utiliser pour SMTP
            $mail->Password = 'Coucousalutbonjour';

            //Paramètre envoyeur
            $email = $_POST['mail'];
            $mail->setFrom($email, "$_POST[prenom], $_POST[nom]");

            //Paramètre destinataire
            $mail->addAddress('pop.cult.e.ure.boutique@gmail.com', 'Boutique Ligne');

            //Objet du mail
            $mail->Subject = $_POST['objet'];

            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

            //Configuration du corps du mail
            $mail->WordWrap = 70;
            $mail->CharSet = 'utf-8';
            $mail->Body = $_POST['message'];
            $_POST['mail'];

            //Attach an image file
            //$mail->addAttachment('images/phpmailer_mini.png');

            //Envoi du message et check les erreurs
            if (!$mail->send()) {
                echo 'Oups, essayez de nouveau !' . $mail->ErrorInfo;
            } else {
                echo 'Nous avons reçu votre message !';
                //Section 2: IMAP
                //Uncomment these to save your message in the 'Sent Mail' folder.
                #if (save_mail($mail)) {
                #    echo "Message saved!";
                #}
            }
        }
    }

    public static function mailwelcome() //Envoi d'un mail de bienvenue
    {

        if (isset($_POST['valider'])) {
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Mailer = 'smtp';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Username = 'pop.cult.e.ure.boutique@gmail.com';
            $mail->Password = 'Coucousalutbonjour';
            $mail->setFrom('pop.cult.e.ure.boutique@gmail.com', "Boutique Ligne");
            $mail->addAddress($_POST['email']);
            $mail->Subject = 'Bienvenue parmi nous !';
            $mail->WordWrap = 70;
            $mail->CharSet = 'utf-8';
            $mail->Body = 'Bienvenue chez Pop Cult(e)ure' . $_POST['login'] . '. Nous espérons que vous trouverez votre bonheur dans notre large gamme de produits !';
            $mail->send();

        }
    }

    public static function disconnect($id) //Supprime le panier après commande
    {
        $panier = new PanierModel();
        $panier->delete($id);
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        header('Refresh:0;url=' . path . 'accueil');
    }

    public static function renderAdmin($fichier, $data = [])
    {
        extract($data);
        ob_start();
        require_once(ROOT . 'view/' . $fichier . '.php');
        $content = ob_get_clean();
        require_once(ROOT . 'view/layout.admin.html.php');
    }
}