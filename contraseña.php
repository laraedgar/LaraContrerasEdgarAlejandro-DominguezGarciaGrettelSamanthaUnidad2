<?php


$token = bin2hex(random_bytes(32));


$to = 'usuario@example.com';
$subject = 'Restablecer contraseña';
$message = 'Para restablecer tu contraseña, haz clic en el siguiente enlace: http://tudominio.com/reset_password.php?token=' . $token;
$headers = 'From: tuemail@example.com';

mail($to, $subject, $message, $headers);

?>
