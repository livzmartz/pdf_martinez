<?php

namespace Controllers;

use Exception;
use Mpdf\HTMLParserMode;
use Mpdf\Mpdf;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class EmailController {
    public static function email(Router $router){

        $email = new PHPMailer(true);
        $email->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );    
        try {
            
            $email->SMTPDebug = SMTP::DEBUG_OFF;                     
            $email->isSMTP();                                            
            $email->Host       = $_ENV['EMAIL_HOST'];                    
            $email->SMTPAuth   = true;                                   
            $email->Username   = $_ENV['EMAIL_USERNAME'];                
            $email->Password   = $_ENV['EMAIL_PASSWORD'];                
            $email->Port       = $_ENV['EMAIL_PORT'];    
            $email->CharSet = "UTF-8";
            $email->setFrom($_ENV['EMAIL_FROM_ADDRESS'], $_ENV['EMAIL_FROM_NAME']);
            $email->isHTML(true); 

            $html = $router->load('email/index', [
                'NOMBRE' => "Livni Martinez"
            ]);
            $email->Body = $html;
            $email->Subject = "PRUEBA DE ENVIO DE EMAIL";
            $email->addAddress("llmc@gmail.com", "CORREO 1");
            $email->send();

            echo "Correo enviado";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}