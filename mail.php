<?php

if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest')
    die('Ай яй яй! Копаться в чужом коде не хорошо!');
else{
    
    $result = [];
    
    $leadData = $_POST;
    
    $message_subject = 'Заявка с сайта Anika-design';
    $message_text = '<p>Новая заявка с сайта</p>';
    $message_text .= '<p>ФИО: '.$leadData['fio'] .'</p>';
		$message_text .= '<p>Телефон: '.$leadData['phone'] .'</p>';
		$message_text .= '<p>Почта: '.$leadData['mail'] .'</p>';
    $message_headers  = 'MIME-Version: 1.0' . "\r\n";
    $message_headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $message_headers .= 'From: Anika-design <mail@anika-design.ru>' . "\r\n";
    
    $message_to = 'stasila78@mail.ru, mail@anika-design.ru';
    
    if( mail($message_to, $message_subject, $message_text, $message_headers) ){
        $result['status'] = 'success';
        $result['msg'] = 'Ваша заявка успешно отправлена.<br> Скоро мы вам перезвоним!';
    } else{
        $result['status'] = 'error';
        $result['msg'] = 'Произошла ошибка, попробуйте позже';
    }
    
    echo json_encode($result);
    
}