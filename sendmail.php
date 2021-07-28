
<?php 

require "phpmailer/PHPMailer.php";
require "phpmailer/Exception.php";
require "phpmailer/SMTP.php";

$title = "Письмо";
$body = '<h1>Письмо</h1>';

if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Имя:</strong>'.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))){
    $body.='<p><strong>E-mail:</strong>'.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['message']))){
    $body.='<p><strong>Сообщение:</strong>'.$_POST['message'].'</p>';
}

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.mail.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'diman_10rus@mail.ru'; // Логин на почте
    $mail->Password   = '301298ww301298ww'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('diman_10rus@mail.ru', 'host'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('pskovstudent@mail.ru');  
    

 
// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;  


// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}



// Отображение результата
echo json_encode( $result);

?>