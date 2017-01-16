<?php
$sendto  = 'malanchukdima@mail.ru'; //Адреса, куда будут приходить письма mk@makintour.com

$name  = trim($_POST['name']);
$email  = trim($_POST['email']);
$phone = trim($_POST['phone']);
$budget = trim($_POST['budget']);
$comment = trim($_POST['comment']);

$id_company = trim($_POST['id_company']);
$id_pages = trim($_POST['id_pages']);
$city = trim($_POST['city']);
$city_yandex = trim($_POST['city_yandex']);
$departure = trim($_POST['departure']);
$date = trim($_POST['date']);
$nights = trim($_POST['nights']);
$adt = trim($_POST['adt']);
$cnn = trim($_POST['cnn']);
$form_type = trim($_POST['form_type']);
$country = trim($_POST['country']);

if(!empty($phone) && isset($phone)) {

// Формирование заголовка письма

    $subject  = '[Новая заявка - Manager]';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
// Формирование тела письма

    $msg  = "<html><body style='font-family:Arial,sans-serif;'>";
    $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Новая заявка - Лендинг с формой подбора тура</h2>\r\n";
    if(!empty($name) && isset($name)) {
        $msg .= "<p><strong>Имя:</strong> " . $name . "</p>\r\n";
    }
    $msg .= "<p><strong>Телефон:</strong> " . $phone . "</p>\r\n";
    
    if(!empty($email) && isset($email)) {
        $msg .= "<p><strong>Email:</strong> " . $email . "</p>\r\n";
    }
    
    if(!empty($budget) && isset($budget)) {
        $msg .= "<p><strong>Бюджет:</strong> " . $budget . "</p>\r\n";
    }

    if(!empty($comment) && isset($comment)) {
        $msg .= "<p><strong>Комментарий:</strong> " . $comment . "</p>\r\n";
    }

    /*if(!empty($id_company) && isset($id_company)) {
        $msg .= "<p><strong>id_company:</strong> " . $id_company . "</p>\r\n";
    }

    if(!empty($id_pages) && isset($id_pages)) {
        $msg .= "<p><strong>id_pages:</strong> " . $id_pages . "</p>\r\n";
    }*/
    
    if(!empty($country) && isset($country)) {
        $msg .= "<p><strong>Страна:</strong> " . $country . "</p>\r\n";
    }

    if(!empty($city) && isset($city)) {
        $msg .= "<p><strong>Город вылета:</strong> " . $city . "</p>\r\n";
    }

    if(!empty($city_yandex) && isset($city_yandex)) {
        $msg .= "<p><strong>city_yandex:</strong> " . $city_yandex . "</p>\r\n";
    }

    if(!empty($departure) && isset($departure)) {
        $msg .= "<p><strong>Направление:</strong> " . $departure . "</p>\r\n";
    }

    if(!empty($date) && isset($date)) {
        $msg .= "<p><strong>Дата вылета:</strong> " . $date . "</p>\r\n";
    }

    if(!empty($nights) && isset($nights)) {
        $msg .= "<p><strong>Количество ночей:</strong> " . $nights . "</p>\r\n";
    }

    if(!empty($adt) && isset($adt)) {
        $msg .= "<p><strong>Количество взрослых:</strong> " . $adt . "</p>\r\n";
    }

    if(!empty($cnn) && isset($cnn )) {
        $msg .= "<p><strong>Количество детей:</strong> " . $cnn  . "</p>\r\n";
    }

    if(!empty($form_type) && isset($form_type)) {
        $msg .= "<p><strong>Тип формы:</strong> " . $form_type . "</p>\r\n";
    }

    $msg .= "</body></html>";
    

// отправка сообщения
    if(mail($sendto, $subject, $msg, $headers)) {
        header("Location: http://www.makintour.com/lp/mpt/thanks.html");
    } else {
        header("Location: http://www.makintour.com/lp/mpt/error.html");
    }

}

else {
    header("Location: http://www.makintour.com/lp/mpt/error.html");
}

?>