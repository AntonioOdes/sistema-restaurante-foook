<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/src/SMTP.php';


$mensaje = $_POST['mensaje'];

$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sebapradenas2203@gmail.com';
    $mail->Password = 'mgaysfvhrmikcvmb';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('sebapradenas2203@gmail.com', 'food ok');
    $mail->addAddress('pm9090309@gmail.com','sugerencia');

    $mail->Subject = "sugerencia";
    $mail->Body = $mensaje;

    $mail->send();

    echo "Correo enviado con éxito";
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>
