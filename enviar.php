<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'milenyumec@gmail.com';
        $mail->Password = 'dqxh pndb asfy feax';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('milenyumec@gmail.com', 'MilenyumSoft');
        $mail->addAddress('milenyumec@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Mensaje del cliente visitante';
        $mail->Body = 'Nombre: ' . $_POST['nombre'] . '<br>' .
                      'Correo: ' . $_POST['email'] . '<br>' .
                      'Mensaje: ' . nl2br($_POST['mensaje']);

        $mail->send();
      //  echo '✅ Mensaje enviado correctamente.';
       header("Location: index.html?envio=exito#contact");
                         
      exit();
    } catch (Exception $e) {
     //   echo '❌ Error al enviar el mensaje: ' . $mail->ErrorInfo;
      header("Location: index.html?envio=error#contact");
                        
    }
}
?>