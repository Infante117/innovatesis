<?php
namespace App\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../PHPMailer/src/Exception.php';
require __DIR__ . '/../PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../PHPMailer/src/SMTP.php';


class emailController {
    public function enviarEmail() {
        // Se filtran y obtienen los datos del formulario
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $emailremitente = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

        // Crear una instancia; pasando `true` habilita las excepciones
        $mail = new PHPMailer(true);

        try {
            // Configuraciones del servidor
            $mail->SMTPDebug = 0;                      // Habilitar salida de depuración detallada
            $mail->isSMTP();                                            // Enviar usando SMTP
            $mail->Host       = 'smtp.gmail.com';                     // Establecer el servidor SMTP para enviar
            $mail->SMTPAuth   = true;                                   // Habilitar autenticación SMTP
            $mail->Username   = 'innovatesisperu.devprueba@gmail.com';  // Nombre de usuario SMTP
            $mail->Password   = 'vfvztmkpemxemipm';                               // Contraseña SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Habilitar cifrado TLS implícito
            $mail->Port       = 465;                                    // Puerto TCP al que conectarse; use 587 si ha configurado `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
            // Destinatarios
            $mail->setFrom($emailremitente,$name);     // Agregar un destinatario    
            $mail->addAddress('innovatesisperu.devprueba@gmail.com');
                
            // Contenido
            $mail->isHTML(true);                                  // Establecer el formato del correo electrónico a HTML
            $mail->Subject = $subject;
            $mail->Body    = 'Nombre: '.$name.'<br>Correo: '.$emailremitente.'<br>Mensaje: '.$message;

        # $email->CharSet = 'UTF-8';
            if($mail->send()){
                       $alerta = [
                           "tipo"   => "limpiar",
                           "titulo" => "Correo Enviado",
                           "texto"  => "El mensaje fue enviado correctamente, en breve nos pondremos en contacto contigo",
                           "icono"  => "success"
                       ];
                       echo json_encode($alerta);
                   }
               } catch (Exception $e) {
                   $alerta = [
                       "tipo"   => "limpiar",
                       "titulo" => "Correo No Enviado",
                       "texto"  => "El mensaje no fue enviado correctamente, intente nuevamente",
                       "icono"  => "error"
                   ];
                   echo json_encode($alerta);
                }
    }
    
    public function ReservarCitaEmail() {
        // Se filtran y obtienen los datos del formulario
        $idservicio = filter_var($_POST['id_servicio'], FILTER_SANITIZE_STRING);
        $servicio = filter_var($_POST['reser_servicio'], FILTER_SANITIZE_STRING);
        $fecha = filter_var($_POST['reser_fecha'], FILTER_SANITIZE_STRING);
        $hora= filter_var($_POST['reser_hora'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['reser_nombre_cliente'], FILTER_SANITIZE_STRING);
        $emailremitente = filter_var($_POST['reser_correo_cliente'], FILTER_SANITIZE_EMAIL);
        $telefono = filter_var($_POST['reser_telefono_cliente'], FILTER_SANITIZE_STRING);
        $message = filter_var($_POST['reser_mensaje_cliente'], FILTER_SANITIZE_STRING);

        // Crear una instancia; pasando `true` habilita las excepciones
        $mail = new PHPMailer(true);

        try {
            // Configuraciones del servidor
            $mail->SMTPDebug = 0;                      // Habilitar salida de depuración detallada
            $mail->isSMTP();                                            // Enviar usando SMTP
            $mail->Host       = 'smtp.gmail.com';                     // Establecer el servidor SMTP para enviar
            $mail->SMTPAuth   = true;                                   // Habilitar autenticación SMTP
            $mail->Username   = 'innovatesisperu.devprueba@gmail.com';  // Nombre de usuario SMTP
            $mail->Password   = 'vfvztmkpemxemipm';                               // Contraseña SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Habilitar cifrado TLS implícito
            $mail->Port       = 465;                                    // Puerto TCP al que conectarse; use 587 si ha configurado `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
            // Destinatarios
            $mail->setFrom($emailremitente,$name);     // Agregar un destinatario    
            $mail->addAddress('innovatesisperu.devprueba@gmail.com');
                
            // Contenido
            $mail->isHTML(true);                                  // Establecer el formato del correo electrónico a HTML
            $mail->Subject = "Reservar Cita";
            $mail->Body    = 'Nombre: '.$name.'
                          <br>Correo: '.$emailremitente.
                         '<br>Telefono: '.$telefono.
                         '<br>Hora y fecha de la Cita: '.$hora.' '.$fecha.
                         '<br>ID/Servicio : #'.$idservicio.' / '.$servicio.
                         '<br>Mensaje: '.$message;

        # $email->CharSet = 'UTF-8';
            if($mail->send()){
                       $alerta = [
                           "tipo"   => "limpiar",
                           "titulo" => "Correo Enviado",
                           "texto"  => "El mensaje fue enviado correctamente, en breve nos pondremos en contacto contigo",
                           "icono"  => "success"
                       ];
                       echo json_encode($alerta);
                   }
               } catch (Exception $e) {
                   $alerta = [
                       "tipo"   => "limpiar",
                       "titulo" => "Correo No Enviado",
                       "texto"  => "El mensaje no fue enviado correctamente, intente nuevamente",
                       "icono"  => "error"
                   ];
                   echo json_encode($alerta);
                }
    }
}