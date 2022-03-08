<?php

use PHPMailer\PHPMailer\PHPMailer;

class Controller
{

    public $path = "/boutique_en_ligne/";

    public function __construct()
    {
    }

    public function loadModel(string $model)

    {
        $this->$model = new $model();
    }

    public static function render($fichier, $data = [])
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


            //Create a new PHPMailer instance
            $mail = new PHPMailer();

            //Tell PHPMailer to use SMTP
            $mail->isSMTP();

            //Enable SMTP debugging
            //SMTP::DEBUG_OFF = off (for production use)
            //SMTP::DEBUG_CLIENT = client messages
            //SMTP::DEBUG_SERVER = client and server messages
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

            //Set the hostname of the mail server
            $mail->Mailer = 'smtp';
            $mail->Host = 'smtp.gmail.com';

            
            //Set the SMTP port number: 587 for SMTP+STARTTLS
            $mail->Port = 587;

            //Set the encryption mechanism to use: STARTTLS (explicit TLS on port 587)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = 'pop.cult.e.ure.boutique@gmail.com';
            
            //Password to use for SMTP authentication
            $mail->Password = 'Coucousalutbonjour';
            
            //Set who the message is to be sent from
            $mail->setFrom($_POST['mail'], "$_POST[prenom], $_POST[nom]");
            
            //Set an alternative reply-to address
            //$mail->addReplyTo('replyto@example.com', 'First Last');

            //Set who the message is to be sent to
            $mail->addAddress('pop.cult.e.ure.boutique@gmail.com', 'Boutique Ligne');
            
            //Set the subject line
            $mail->Subject = $_POST['objet'];

            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

            //Config body mail
            $mail->WordWrap = 70;
            $mail->CharSet = 'utf-8';
            $mail->Body = $_POST['message'];

            //Attach an image file
            //$mail->addAttachment('images/phpmailer_mini.png');

            //send the message, check for errors
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

    public function disconnect($id)
    {
        if (isset($_POST['deco'])) {
            $panier = new PanierModel();
            $panier->delete($_SESSION['id']);
            unset($_SESSION['id']);
            header('location:' . path . 'accueil');
        }
    }
}