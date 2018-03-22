<?php
$fio = $_POST['fio'];
$sum = $_POST['sum'];
$email = $_POST['email'];
$mes = "ФИО: $fio\nСума инвестиций: $sum\nE-mail: $email";

$fio = htmlspecialchars($fio);
$sum = htmlspecialchars($sum);
$email = htmlspecialchars($email);

$fio = urldecode($fio);
$sum = urldecode($sum);
$email = urldecode($email);

$fio = trim($fio);
$sum = trim($sum);
$email = trim($email);
//echo $fio;
//echo "<br>";
//echo $email;
if (mail("Info@surrus.io,  generalforwork@gmail.com, ttt.blackrar.alex@gmail.com", "Заявка с сайта",  $mes ,"From: $email \r\n"))
{    echo("<script type='text/javascript'>");
    echo("history.go(-1);");
    echo("alert('Сообщение отправлено!');</script>");

} else {
    echo "при отправке сообщения возникли ошибки";
}

exit();
?>