<?php

use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require_once 'vendor/autoload.php';
require_once 'globalController.controller.php';

$formController = new FormController;

class FormController
{
    public function formCheck()
    {
        if (isset($_POST['envoyer'])) {
            try {
                $error = "";
                //on vérifie que le champ mail est correctement rempli
                if (empty($_POST['email'])) {
                    $error .= "Le champ email et vide";
                }
                //on vérifie que l'adresse est correcte
                if (!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,}$#i", $_POST['email'])) {
                    $error .= "Adresse mail incorrect";
                }
                //on vérifie que le champ sujet est correctement rempli
                if (empty($_POST['sujet'])) {
                    $error .= "</br> Veuillez renseigner le sujet";
                }
                //on vérifie que le champ message n'est pas vide
                if (empty($_POST['message'])) {
                    $error .= "</br> Le champ du message est vide";
                }
                if (!empty($error)) {
                    throw new Exception($error);
                } else {
                    $mail = new PHPMailer(true);

                    $sujet = $_POST['sujet'];
                    $addressEmail = $_POST['email'];
                    $teteMessage = " Sujet : " . " [$sujet] " . " Adresse mail : " . " [$addressEmail] ";
                    $body = $_POST['message'];


                    //Reglages Serveur
                    $mail->SMTPDebug = 0;                                       //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'testprogrammationpc@gmail.com';        //SMTP username
                    $mail->Password   = '3f4f60f63a1';                          //SMTP password
                    $mail->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Récepteur
                    $mail->addAddress('testprogrammationpc@gmail.com');
                    $mail->addReplyTo($addressEmail, '');
                    
                    //Contenu du mail 
                    $mail->isHTML(true);                                                        //Set email format to HTML
                    $mail->Subject = $teteMessage;
                    $mail->Body = $body;
                    $mail->AltBody = strip_tags($body);
                    $mail->send();

                }
                GlobalController::alert("success", "Formulaire envoyé");
            } catch (Exception $e) {
                GlobalController::alert("danger", $e->getMessage());
            }
        }
        require 'views/contact.view.php';
    }
}
