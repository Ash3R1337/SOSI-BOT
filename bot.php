<?php

//Приветствие
function SendWelcome($peer_id, $user_id, $vk) {
    $userInfo = $vk->request("users.get", ["user_ids" => $user_id]);
    $first_name = $userInfo[0]['first_name']; // Имя пользователя 
    $message = "Привет, {$first_name}!";
    $vk->sendMessage($peer_id, $message);
    SendMainButtons($peer_id, $vk);
}

//Отправка основной клавиатуры
function SendMainButtons($peer_id, $vk) {
    $rndPost = $vk->buttonText('Случайный пост', 'primary', ['command' => 'btn_rndPost']);
    $rndRubPost = $vk->buttonText('Рубрики', 'secondary', ['command' => 'btn_rndRubPost']);
    $vk->sendButton($peer_id, "Выбери, что тебя интересует, с помощью кнопок снизу👇", [[$rndPost], [$rndRubPost]]);
}

//Клавиатура с рубликами
function SendRubricButtons($peer_id, $vk) {
    $Games = $vk->buttonText('🎮 Игры', 'primary', ['command' => 'btn_Games']);
    $Characters = $vk->buttonText('🍨 Персонажи', 'primary', ['command' => 'btn_Characters']);
    $Others = $vk->buttonText('🔗 Другие ресурсы', 'primary', ['command' => 'btn_Others']);
    $Subs = $vk->buttonText('❤️️ Творчество подписчиков', 'positive', ['command' => 'btn_Subs']);
    $Back = $vk->buttonText('🔙 Назад', 'secondary', ['command' => 'btn_Back']);
    $vk->sendButton($peer_id, "Выбери, посты из какой рубрики тебя интересуют", [[$Games], [$Characters], [$Subs], [$Others], [$Back]]);
}

//Клавиатура с играми
function SendGameButtons($peer_id, $vk) {
    $dmc = $vk->buttonText('Devil May Cry', 'primary', ['command' => 'btn_dmc']);
    $dmc2 = $vk->buttonText('Devil May Cry 2', 'negative', ['command' => 'btn_dmc2']);
    $dmc3 = $vk->buttonText('Devil May Cry 3', 'primary', ['command' => 'btn_dmc3']);
    $dmc4 = $vk->buttonText('Devil May Cry 4', 'primary', ['command' => 'btn_dmc4']);
    $dmc5 = $vk->buttonText('Devil May Cry 5', 'primary', ['command' => 'btn_dmc5']);
    $Back = $vk->buttonText('🔙 Назад', 'secondary', ['command' => 'btn_Back']);
    $vk->sendButton($peer_id, "Выбрана рубрика: Игры", [[$dmc], [$dmc2], [$dmc3], [$dmc4], [$dmc5], [$Back]]);
}

//Клавиатура с персонажами
function SendCharactersButtons($peer_id, $vk) {
    $vergil = $vk->buttonText('Вергилий', 'primary', ['command' => 'btn_vergil']);
    $dante = $vk->buttonText('Данте', 'primary', ['command' => 'btn_dante']);
    $nero = $vk->buttonText('Неро', 'primary', ['command' => 'btn_nero']);
    $vdmc = $vk->buttonText('Ви', 'primary', ['command' => 'btn_vdmc']);
    $nico = $vk->buttonText('Нико', 'primary', ['command' => 'btn_nico']);
    $trish = $vk->buttonText('Триш', 'primary', ['command' => 'btn_trish']);
    $lady = $vk->buttonText('Леди', 'primary', ['command' => 'btn_lady']);
    $fury = $vk->buttonText('Фьюри', 'primary', ['command' => 'btn_fury']);
    $kyrie = $vk->buttonText('Кирие', 'primary', ['command' => 'btn_kyrie']);
    $Back = $vk->buttonText('🔙 Назад', 'secondary', ['command' => 'btn_Back']);
    $vk->sendButton($peer_id, "Выбрана рубрика: Персонажи", [[$vergil], [$dante], [$nero], [$vdmc], [$nico], [$trish], [$lady], [$fury], [$kyrie], [$Back]]);
}

//Клавиатура с другими ресурсами
function SendSourceButtons($peer_id, $vk) {
    $reddit = $vk->buttonText('Reddit', 'primary', ['command' => 'btn_reddit']);
    $twitter = $vk->buttonText('Twitter', 'primary', ['command' => 'btn_twitter']);
    $facebook = $vk->buttonText('Facebook', 'primary', ['command' => 'btn_facebook']);
    $pinterest = $vk->buttonText('Pinterest', 'primary', ['command' => 'btn_pinterest']);
    $Back = $vk->buttonText('🔙 Назад', 'secondary', ['command' => 'btn_Back']);
    $vk->sendButton($peer_id, "Выбрана рубрика: Другие ресурсы", [[$reddit], [$twitter], [$facebook], [$pinterest], [$Back]]);
}


//Случайный пост
function SendRndPost($peer_id, $vk, $token, $group_id) {
    //Вызов хранимой процедуры, получающей 500 постов
    $post = json_decode(file_get_contents("https://api.vk.com/method/execute.ExtWallGet?owner_id=-$group_id&v=5.103&access_token=$token"));
    $post = $post->response; //Получение массива
    $rnd = rand(1, count($post)-1); //Выбор случайного поста
    $postId = $post[$rnd]->id; //Id случайно выбранного поста
    $vk->request('messages.send', ['peer_id' => $peer_id, 'attachment' => 'wall-'.$group_id."_$postId"]);
    //Нахождение последнего поста
    /*$post = json_decode(file_get_contents("https://api.vk.com/method/wall.get?owner_id=-$group_id&count=2&filter=all&v=5.103&access_token=$token"));
    $post = $post->response->items; // Получаем массив
    $lastPostId = $post[1]->id;
    //Генератор случайного id
    $rnd = rand(1, $lastPostId);
    //Проверка на существование поста
    $currentPost = json_decode(file_get_contents('https://api.vk.com/method/wall.getById?posts=-'.$group_id."_$rnd&extended=0&v=5.103&access_token=$token"));
    $currentPost = $currentPost->response;
    $vk->sendMessage($peer_id, strlen($currentPost[0]->id));
    if ((strlen($currentPost[0]->id) > 0) and ($currentPost[0]->post_type == 'post'))
        $vk->request('messages.send', ['peer_id' => $peer_id, 'attachment' => 'wall-'.$group_id."_$rnd"]);
    else
        SendRndPost($peer_id, $vk, $token, $group_id);*/
   
  /* $currentPost = json_decode(file_get_contents('https://api.vk.com/method/wall.getById?posts=-'.$group_id."_$rnd&extended=1&v=5.103&access_token=$token"));
    $currentPost = $currentPost->response->items;
    */
    
}

//Случайный пост из определенной рубрики
function SendRndRubricPost($peer_id, $vk, $token, $group_id, $rubric) {
    $post = json_decode(file_get_contents("https://api.vk.com/method/execute.ExtWallGet?owner_id=-$group_id&v=5.103&access_token=$token"));
    $post = $post->response;
    $rubricArray = array();
    for ($i = 0; $i < count($post); $i++)
        if(strpos($post[$i] -> text, $rubric) !== false)
            array_push($rubricArray, $post[$i]);
    if (count($rubricArray) == 0)
       $vk->sendMessage($peer_id, 'К сожалению, пока нет постов из этой рубрики😔'); 
    else {
       $rnd = rand(0, count($rubricArray)-1);
       $postId = $rubricArray[$rnd]->id;
       $vk->request('messages.send', ['peer_id' => $peer_id, 'attachment' => 'wall-'.$group_id."_$postId"]); 
    }
}