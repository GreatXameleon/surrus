<?php
$email = $_POST['email'];
$mes = "$email ";

$email = htmlspecialchars($email);

$email = urldecode($email);

$email = trim($email);

if (mail("Info@surrus.io,  generalforwork@gmail.com, ttt.blackrar.alex@gmail.com", "Подписка",  $mes ,"From: $email \r\n"))
{    echo("<script type='text/javascript'>");
    echo("history.go(-1);");
    echo("alert('Сообщение отправлено!');</script>");

} else {
    echo "при отправке сообщения возникли ошибки";

}

exit();
?>