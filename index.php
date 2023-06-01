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
$message = $data->object->message;
$token = 'vk1.a.pPPvEfyKztl8_MT24Knxa5ahEdYt2HH9P8W76BXdFvhYmtMFgNzkHUdijKv-QO4aNwervFv2s4hgoTKALMSUsteJFovd93g93fZqeI445Yaecc0l4G0UTxUmR2Z2GuzHvvmNeuNdNsG7QZYK-o5PO0cRUzUkMj31qukgYGdW3G9fCvxgPlKcrYC3BX-x0d_JuU4RP9xV2wvM5vejZ2PMig'; //Свой токен
//$group_id = '176743770';
$group_id = '214838056';
$rubric = '';
$botVersion = '1.1.2';
$changeLog = "🆕 Версия 1.0 (16.08.22)\n- Запуск бота.\n- Добавлена возможность просматривать случайный пост. \n- Добавлена возможность просматривать случайный пост из разных рубрик (Игры, Персонажи, Другие источники и Предложка)\n
🆕 Версия 1.0.1 (26.08.22)\n - Добавлена подрубрика DmC в рубрику Игры\n
🆕 Версия 1.1.0 (02.05.23)\n - Добавлено ПОРНО (доступно только по платной подписке)\n
🆕 Версия 1.1.1 (03.05.23)\n - Добавлены видео к предыдущему обновлению\n- Увеличено количество картинок\n
🆕 Версия 1.1.2 (09.05.23)\n - Добавлено больше видео\n- Увеличено количество картинок\n- Добавлен список скрытых команд, который вызывается по команде Список скрытых команд";
$hiddenCommandsList = "Список команд:\n
📍 Порно видео - вызывает порно видео (при наличии платной подписки);\n📍 Количество порно видео - выводит количество порно видео в базе фуллов;\n📍 Порно - вызывает порно картинку (при наличии платной подписки);\n📍 Количество порно - выводит количество порно картинок в базе фуллов;\n📍 Количество людей, которое съел жирный людоед - вызывает дневной рацион Маши Невской в людях;\n📍 Беседа id - отображает идентификатор текущей беседы;\n📍 Скрыть клавиатуру - скрывает текущую клавиатуру бота";

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
else if (mb_strtolower($message_text) == 'порно')//307155262 $user_id == 528117878
    SendPorn($peer_id, $vk); 
else if (mb_strtolower($message_text) == 'количество порно')
    SendPornCount($peer_id, $vk); 
else if (mb_strtolower($message_text) == 'порно видео')
    SendPornVid($peer_id, $vk); 
else if (mb_strtolower($message_text) == 'количество порно видео')
    SendPornVidCount($peer_id, $vk); 
else if (mb_strtolower($message_text) == 'беседа id')
    $vk->sendMessage($peer_id, $peer_id);
else if (mb_strtolower($message_text) == 'количество людей, которое съел жирный людоед')
    $vk->sendMessage($peer_id, 'Дневной рацион Маши Невской: 9 человек');
else if (mb_strtolower($message_text) == 'список скрытых команд')
    $vk->sendMessage($peer_id, $hiddenCommandsList);
else if (mb_strtolower($message_text) == 'скрыть клавиатуру')
    KeyboardHide($peer_id, $vk);
else if (mb_strtolower($message_text) == 'жирный людоед' || mb_strtolower($message_text) == 'жырный людоед' || mb_strtolower($message_text) == 'жырный людоед.' || mb_strtolower($message_text) == 'жирный людоед.') {
    $vk->request('messages.send', ['peer_id' => $peer_id, 'attachment' => 'photo511642568_457268415']);
    $vk->request('messages.send', ['peer_id' => $peer_id, 'attachment' => 'photo511642568_457268415']);
    $vk->request('messages.send', ['peer_id' => $peer_id, 'attachment' => 'photo511642568_457268415']);
}
else if ($message->attachments[0]->type == 'sticker') {
    try {
            $sticker = $message->attachments[0]->sticker;
            // Проверяем идентификатор стикера
            $stickerId = $sticker->sticker_id;
            if ($stickerId == 85029) {
                $vk->request('messages.send', ['peer_id' => $peer_id, 'sticker_id' => 85029]);
            }
            else if ($stickerId == 86167) {
                $vk->request('messages.send', ['peer_id' => $peer_id, 'attachment' => 'photo-220493822_457239068']);
            }
    }
    catch (Exception $e) 
    {
        $vk->sendMessage($peer_id, 'Ошибка: '. $e->getMessage());
        exit;
    }
}

else if (mb_strtolower($message_text) == 'дмц')
{
    try 
    {
        $vk->sendMessage($peer_id, 'Загрузка изображения...');
        $uploadServer = $vk->request('photos.getMessagesUploadServer', [
        'peer_id' => $peer_id // ID беседы
        ]);
        if (!$uploadServer) {
            $vk->sendMessage($peer_id, 'Ошибка при получении URL сервера: ' . $vk->getLastError());
            exit;
        }
        $photo = __DIR__ . '/che.jpg'; //'images/dmc/0001_MzFEiL35_M.jpg'; // путь к фото
        $vk->sendMessage($peer_id, $photo);
        $fileContent = file_get_contents($photo);
        if (!$fileContent) {
            $vk->sendMessage($peer_id, 'Ошибка при чтении файла: ' . error_get_last()['message']);
            exit;
        }
        $uploadResponse = $vk->upload($uploadServer['upload_url'], [
        'photo' => $fileContent
        ]);
        $saveResponse = $vk->request('photos.saveMessagesPhoto', [
        'server' => $uploadResponse['server'],
        'photo' => $uploadResponse['photo'],
        'hash' => $uploadResponse['hash']
        ]);
        $ownerId = $saveResponse[0]['owner_id'];
        $photoId = $saveResponse[0]['id'];
        $vk->request('messages.send', [
        'peer_id' => $peer_id, // ID беседы
        'attachment' => "photo{$ownerId}_{$photoId}"
        ]);
    }   
    catch (Exception $e) 
    {
        $vk->sendMessage($peer_id, 'Ошибка: '. $e->getMessage());
        exit;
    }
}
    
    /*$MuteUser_id = 307155262;
    MuteUser($peer_id, $MuteUser_id, $vk);
    function MuteUser($peer_id, $MuteUser_id, $vk) 
    {
        $vk->request('messages.delete', ['message_ids' => $MuteUser_id, 'delete_for_all' => 1, 'peer_id' => $peer_id]);
        $vk->sendMessage($peer_id, "Работает");
    }*/
    
