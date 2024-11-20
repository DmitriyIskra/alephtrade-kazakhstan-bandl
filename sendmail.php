<?php
    

    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    
    require './PHPMailer-6.8.0/src/Exception.php';
    require './PHPMailer-6.8.0/src/PHPMailer.php';
    require './PHPMailer-6.8.0/src/SMTP.php';

    // require '/home/c/cq96411/public_html/PHPMailer-6.8.0/src/Exception.php';
    // require '/home/c/cq96411/public_html/PHPMailer-6.8.0/src/PHPMailer.php';

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->Host = 'smtp.yandex.ru';
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Username = 'iskradmitrii@yandex.ru';
    $mail->Password = 'ihkuaznoznpeyygo';
    $mail->isHTML(true);
  

    // Откого письмо
    $mail->setFrom('iskradmitrii@yandex.ru', 'Запрос с сайта Алефтред'); // не использовать mail
    // Кому отправить
    $mail->addAddress('iskradmitrii@yandex.ru'); //  dmitriyiskra@mail.ru
    // Тема письма
    $mail->Subject = 'Запрос с сайта Alephtrade'; 


    // Тело письма
    $body = '<h1>Данные пользователя</h1>';
    if(trim(!empty($_POST['name']))) { 
        $body.='<p><strong>Имя: </strong>'.$_POST['name'].'</p>';
    }

    if(trim(!empty($_POST['phone']))) { 
        $body.='<p><strong>Телефон: </strong>'.$_POST['phone'].'</p>';
    }

    if(isset($_POST['email']) && $_POST['email'] !== '') { 
        $body.='<p><strong>Почта: </strong>'.$_POST['email'].'</p>';
    }

    if(trim(!empty($_POST['city']))) { 
        $body.='<p><strong>Город: </strong>'.$_POST['city'].'</p>';
    }

    if(trim(!empty($_POST['message']))) { 
        $body.='<p><strong>Сообщение: </strong>'.$_POST['message'].'</p>';
    }

    if(trim(!empty($_POST['consent']))) { 
        $body.='<p><strong>Пользовательское соглашение: </strong>'.$_POST['consent'].'</p>';
    }
  

    $mail->Body = $body;

    $message;
    if(!$mail->send()) {
        $message = false;
    } else {
        $message = true;
    }

    $responce = ['message' => $message];

    echo json_encode($responce);
} catch (\Throwable $th) {
    //throw $th;
}
    
