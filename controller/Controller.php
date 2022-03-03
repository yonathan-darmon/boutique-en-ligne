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
        if(isset($_POST['send'])) {
            $to = "aurelien.adjimi@laplateforme.io";
            $subject = $_POST['objet'];
            $message = $_POST['message'];
            $message = wordwrap($message, 70, "\r\n");
    
            $headers = [
                "From" => $_POST['mail'],
                "Reply-To" => "aurelien.adjimi@laplateforme.io",
                "Content-Type" => "text/html; charset=utf-8"
    ];
            $sendmail = mail($to, $subject, $message, $headers);
            if($sendmail)
            echo 'Message envoyé !';
        }
    }
}