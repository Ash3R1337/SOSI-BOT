<?php

require_once 'config.php';
require_once 'bot.php';
require_once('simplevk-master/autoload.php');

use DigitalStar\vk_api\VK_api as vk_api; // Основной класс
use DigitalStar\vk_api\VkApiException; // Обработка ошибок

$vk = vk_api::create(VK_API_ACCESS_TOKEN, "5.103")->setConfirm(CALLBACK_API_CONFIRMATION_TOKEN);
$data = json_decode(file_get_contents('php://input'));
$vk->sendOK();
$message_text = $data->object->message->text;
$peer_id = $data->object->message->peer_id;
$user_id = $data->object->message->from_id;
$token = 'vk1.a.5wn5GqFnYhTP59W6dYFTTjxakrIL__XA1ov3wjycL23jM7xLv8F-uMLoxtR7ogv4qJRIOo8qyw61c6fDq5EzxJSazze85UaQLxlwFZmNu8GIA5Th1m3F2LfyEMTMfs6bGcHyCdep8FpuVPLV3WWSCUCXiKl1sjspPi5cFAZVM31AacttEL9zI0F-HCeT64F1';
//$group_id = '176743770';
$group_id = '214838056';
$rubric = '';
$botVersion = '1.0.1';
$changeLog = "🆕 Версия 1.0 (16.08.22)\n- Запуск бота.\n- Добавлена возможность просматривать случайный пост. \n- Добавлена возможность просматривать случайный пост из разных рубрик (Игры, Персонажи, Другие источники и Предложка)\n
🆕 Версия 1.0.1 (26.08.22)\n - Добавлена подрубрика DmC в рубрику Игры";

if (mb_strtolower($message_text) == 'начать')
    SendWelcome($peer_id, $user_id, $vk);
else if (mb_strtolower($message_text) == 'случайный пост')
    SendRndPost($peer_id, $vk, $token, $group_id);
else if (mb_strtolower($message_text) == 'рубрики')
    SendRubricButtons($peer_id, $vk);
else if (mb_strtolower($message_text) == '🎮 игры')
    SendGameButtons($peer_id, $vk);
    else if (mb_strtolower($message_text) == 'devil may cry') {
        $rubric = '#dmc';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'devil may cry 2') {
        $rubric = '#dmc2';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'devil may cry 3') {
        $rubric = '#dmc3';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'devil may cry 4') {
        $rubric = '#dmc4';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'devil may cry 5') {
        $rubric = '#dmc5';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'dmc') {
        $rubric = '#dmcreboot';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
else if (mb_strtolower($message_text) == '🍨 персонажи')
    SendCharactersButtons($peer_id, $vk);
    else if (mb_strtolower($message_text) == 'вергилий') {
        $rubric = '#vergil';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'данте') {
        $rubric = '#dante';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'неро') {
        $rubric = '#nero';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'ви') {
        $rubric = '#vdmc';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'нико') {
        $rubric = '#nico';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
     else if (mb_strtolower($message_text) == 'триш') {
        $rubric = '#trish';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'леди') {
        $rubric = '#lady';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'фьюри') {
        $rubric = '#fury';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'кирие') {
        $rubric = '#kyrie';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
else if (mb_strtolower($message_text) == '🔗 другие ресурсы')
    SendSourceButtons($peer_id, $vk);
     else if (mb_strtolower($message_text) == 'reddit') {
        $rubric = '#reddit';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'twitter') {
        $rubric = '#twitter';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'facebook') {
        $rubric = '#facebook';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
    else if (mb_strtolower($message_text) == 'pinterest') {
        $rubric = '#pinterest';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
else if (mb_strtolower($message_text) == '❤️️ творчество подписчиков'){
        $vk->sendMessage($peer_id, 'Выбрана рубрика: Творчество подписчиков');
        $rubric = '#ПРЕДЛОЖКА';
        SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric);  
    }
else if (mb_strtolower($message_text) == '🔙 назад')
    SendMainButtons($peer_id, $vk);
else if (mb_strtolower($message_text) == 'версия')
    $vk->sendMessage($peer_id, "Текущая версия бота: $botVersion. История изменений:\n$changeLog");
    
    
