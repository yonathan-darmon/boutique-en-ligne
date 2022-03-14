<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('ASSET/PHPMailer-6.6.0/src/Exception.php');
require_once('ASSET/PHPMailer-6.6.0/src/PHPMailer.php');
require_once('ASSET/PHPMailer-6.6.0/src/SMTP.php');

class Inscription extends Controller
{

    public static function sendMailWelcome(){
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
        $mail -> isHTML(true);
        $mail->CharSet = 'utf-8';
        $mail->Body = '<p style="font-size: 32px; color: Blue;">Bienvenue chez Pop Cult(e)ure</p>'. ' ' .'<p style="font-size: 52px; color: Red;">'.$_POST['login'].'</p>'. '<h3 style="font-size: 20px;">Nous espérons que vous trouverez votre bonheur <br>dans notre large gamme de produits !</p>';
        $mail -> send();
    }

    
    public static function Register()
    {
        $success = [];
        if (isset($_POST['valider'])) {
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $passwordverify = htmlspecialchars($_POST['passwordverify']);
            $email = htmlspecialchars($_POST['email']);
            $adress = htmlspecialchars($_POST['numero']) . ',' . htmlspecialchars($_POST['nom']) . htmlspecialchars($_POST['codepostal']) . htmlspecialchars($_POST['ville']);
            $user=new UtilisateursModel();
            $utilisateur=$user->getOne('email',$email);
            $loginExist=$user->getOne('login',$login);
            if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['numero']) && !empty($_POST['nom']) && !empty($_POST['codepostal']) && !empty($_POST['ville'])) {
                if ($password != $passwordverify) {
                    $error1="verifiez votre mot de passe";
                    self::render("inscription", compact('error1'));


                } 
                elseif (!empty($utilisateur)){
                    $error1="Cet Email est déjà utilisé pour un autre compte";
                    self::render("inscription", compact('error1'));

                }
                elseif(!empty($loginExist)){
                    $error1="Ce nom d'utilisateur est déjà utilisé";
                    self::render("inscription", compact('error1'));
                }
                else {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $user = new Utilisateursmodel();
                    $user->insert($login, $hash, $email, $adress);
                    array_push($success, 'Vous êtes bien inscrit');
                    self::render("inscription", compact('success'));
                    self::sendMailWelcome();

                }
            } else {
                echo "Veuillez remplir les champs";
            }

        }
        self::render("inscription",compact('success'));
    }
    public static function index()
    {
        self::sendMailWelcome();
        self::render('inscription');
    }
}


?>