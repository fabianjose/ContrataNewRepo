<?php


// No mostrar los errores de PHP
error_reporting(0);



$result="";
if(isset($_POST['submit'])){
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host='mail.teledisca.com';
    $mail->Port=465;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='ssl';
    $mail->Username='envios@teledisca.com';
    $mail->Password=';3Wt5+H)3!FO';

    $mail->setFrom($_POST['envios@teledisca.com']);
    $mail->addAddress('espejofabian@gmail.com');

    $mail->isHTML(true);
    $mail->Subject='Enviado por Desde Contrata Internet';
    $mail->Body='<h1 align=center> correo de contratainternet'.
    '<br>Nombre: '.$_POST['nombre'].
    '<br>Telefono: '.$_POST['telefono'].    
    '<br>Correo: '.$_POST['correo'].
    '<br>mensaje: '.$_POST['mensaje'].
    '</h1>';
    if(!$mail->send()){
        $result="Algo esta mal, por favor inténtelo de nuevo.";

      
    }
    else{
        $result="Gracias  por contactarnos, espera la respuesta!";
    
    }
}

echo'<script type="text/javascript">
    alert("Correo Enviado");
 window.location.href="http://contratainternet.co/";
    </script>';
?>
