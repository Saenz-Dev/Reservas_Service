<?php

$rootAutoload = dirname(__DIR__, 4) . '/vendor/autoload.php';
$restAutoload = dirname(__DIR__, 3) . '/vendor/autoload.php';

if (is_file($rootAutoload)) {
    require_once $rootAutoload;
}

if (is_file($restAutoload)) {
    require_once $restAutoload;
}

use \PHPMailer\PHPMailer\PHPMailer;

class Email extends RequestCorreo
{

    public function enviarCorreo()
    {
        $mail = new PHPMailer(true);

        try {
            //Extracción de datos del cuerpo de la solicitud
            $cuerpo = JSONUtil::decodeJSON();

            // Configuración SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'saenzm963@gmail.com'; // Tu correo;
            $mail->Password = 'taqi mvnn cree obax'; // Tu contraseña;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Remitente y destinatario
            $mail->setFrom('saenzm963@gmail.com', 'Task Manager');
            $mail->addAddress($cuerpo->correo_destino);

            // Contenido
            $mail->isHTML(true);
            $mail->Subject = 'Vencimiento de tarea';
            $mail->Body = 'La tarea <b>' . $cuerpo->nombre_tarea . '</b> vence el ' . $cuerpo->fecha_vencimiento . '.';

            $mail->send();
            // echo 'Correo enviado correctamente';
        } catch (Exception $e) {
            // echo "Error: {$mail->ErrorInfo}";
            throw new ExcepcionApi(INTERNAL_SERVER_ERROR, ST500, "Error al enviar correo: {$mail->ErrorInfo}");
        }
    }


}