<?php
require_once('ASSET/PHPMailer-6.6.0/src/Exception.php');
require_once('ASSET/PHPMailer-6.6.0/src/PHPMailer.php');
require_once('ASSET/PHPMailer-6.6.0/src/SMTP.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Connexion extends Controller
{

    public static function index()
    {
        $errors = [];
        $success = [];
        if (isset($_POST['connect'])) {

            $usermodel = new UtilisateursModel();
            $user = $usermodel->getOne('login', htmlspecialchars($_POST['login']));
            if (!empty($user)) {
                if ($user[0]['password'] == password_verify($_POST['password'], $user[0]['password'])) {
                    $_SESSION['id'] = $user[0]['id'];
                    $_SESSION['login'] = $user[0]['login'];
                    $success[] = 'Bienvenue ' . $user[0]['login'];
                    self::render("connexion", compact("errors", "success"));
                    header('Refresh:2,' . path . 'accueil');

                } else {
                    array_push($errors, 'Login ou mot de passe incorrect');
                }
            } else {
                array_push($errors, 'Login ou mot de passe incorrect');
            }

        }
        self::render("connexion", compact("errors", "success"));


    }

    public static function reset()
    {
        $error = [];
        $success = [];
        if (isset($_POST['reset'])) {
            if (!empty($_POST['email'])) {
                $user = new UtilisateursModel();
                $mail = $user->getOne('email', $_POST['email']);
                if (!empty($mail)) {
                    $mdp = uniqid();
                    echo $mdp;
                    $hashedpassword = password_hash($mdp, PASSWORD_DEFAULT);
                    $user->updatePassword($hashedpassword, $_POST['email']);
                    self::sendMailForget($mdp);
                    array_push($success, 'Votre nouveau mot de passe est bien envoyé');

                } else {
                    array_push($error, 'Cette addresse mail n\'est pas utilisé');
                }
            } else {
                array_push($error, "Veuillez remplir le champ");
            }
        }
        self::render("oublipass", compact('error', 'success'));
    }


    public static function sendMailForget($mdp){
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
        $mail->Subject = 'Nouveau mot de passe !';
        $mail->WordWrap = 70;
        $mail->CharSet = 'utf-8';
        $mail->Body = 'Bonjour voici votre nouveau mot de passe: '. $mdp. '. Nous vous invitons à le modifier le plus tot possible dans votre page profil';
        $mail -> send();
    }

}
