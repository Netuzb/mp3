
<?php
ob_start();
define('API_KEY','1259846948:AAHBI3Nur3nRdmSsLQdXQmY0etnv1r4Aw0M');

$admin = "741494603";
function fsize($size,$round=2)
{
$sizes=array(' Bytes',' Kb',' Mb',' Gb',' Tb');
$total=count($sizes)-1;
for($i=0;$size>1024 && $i<$total;$i++){
$size/=1024;
}
return round($size,$round).$sizes[$i];
}
function del($nomi){
   array_map('unlink', glob("$nomi"));
   }
 
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}   
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$reply= $message->reply_to_message->text;
$data = $update->callback_query->data;

$mid = $message->message_id;
$chat_id = $message->chat->id;
$callfrid = $update->callback_query->from->id;
$ccid = $update->callback_query->message->chat->id;
$cid2 = $update->callback_query->message->chat->id;
$cmid = $update->callback_query->message->message_id;
$calluser = $update->callback_query->message->chat->username;
$callfrname = $update->callback_query->from->first_name;
$text1 = $message->text;
$qid = $update->callback_query->id;
$fadmin = $message->from->id;
//channel sozlamalari
$channel = $update->channel_post;
$channel_id = $channel->chat->id; 
$channel_user = $channel->chat->username;
$chtext = $channel->text;
$title = $channel->chat->title;
$chanel_mus = $channel->audio;
$doc=$channel->audio;
 $doc=$message->audio;
$doc_id = $chanel_mus->file_id;
$channel_mid = $channel->message_id;
$muser = $channel->chat->username;
mkdir("like");

$sreply = $message->reply_to_message->text;  $sreplyd = $message->audio;
    $ent = $message->entities[0]->type;
    $reply_menu = json_encode([
           'resize_keyboard'=>false,
                'force_reply' => true,
                'selective' => true
            ]);
if($text1=="/start"){  
$baza = file_get_contents("pechat.dat");
if(mb_stripos($baza, $chat_id) !== false){
}else{
file_put_contents("pechat.dat", "$baza\n$chat_id");
}
  $text = "🎵Auto music editor🎧.
Botni kanalingizga admin qiling.
Musiqa yuboring.Yuborgan musiqangizga kanalingiz usernamesini qo'yadi va musiqa ma'lumotlarini tagiga yozib beradi va yana bir funksiya musiqangizdan 25-45 soniya qirqib ham beradi. Barchasi avtomatlashtirilgan.

Kanalga yuboriladigon buyruqlar:
#cap so'z - xar bir kanalga joylangan musiqaning tagiga siz belgilagan matnni yozib qo'yadi.
#btn so'z - Yuborish tugmasidagi matnni ixtiyoriy so'zga o'zgartrish mumkin. Oldingi matnga qaytarish uchun shunchaki kanalga #btn deb yuboring.
Bu buyruqlar faqat kanalda ishlaydi.";
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$text,
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"⚔Kanalimiz",'url'=>'t.me/Turkcha_Mp3'],['text'=>"👨‍💻Developer",'url'=>"t.me/Virus8096"]],
        [['text'=>"📊Statistika",'callback_data'=>'stat'],['text'=>"♻️Like bosganlarni ko'rish",'url'=>"t.me/Likechilarimiz"]],
]
    ])
  ]);
} 

if($data=="orqa") {
	bot('EditMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$cmid,
	'text'=>"🎵Auto music editor🎧.
Botni kanalingizga admin qiling.
Musiqa yuboring.Yuborgan musiqangizga kanalingiz usernamesini qo'yadi va musiqa ma'lumotlarini tagiga yozib beradi va yana bir funksiya musiqangizdan 25-45 soniya qirqib ham beradi. Barchasi avtomatlashtirilgan.

Kanalga yuboriladigon buyruqlar:
#cap so'z - xar bir kanalga joylangan musiqaning tagiga siz belgilagan matnni yozib qo'yadi.
#btn so'z - Yuborish tugmasidagi matnni ixtiyoriy so'zga o'zgartrish mumkin. Oldingi matnga qaytarish uchun shunchaki kanalga #btn deb yuboring.
Bu buyruqlar faqat kanalda ishlaydi.",
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"⚔Kanalimiz",'url'=>'t.me/Turkcha_Mp3'],['text'=>"👨‍💻Developer",'url'=>"t.me/Virus8096"]],
        [['text'=>"📊Statistika",'callback_data'=>'stat'],['text'=>"♻️Like bosganlarni ko'rish",'url'=>"t.me/Likechilarimiz"]],
]
    ])
  ]);
} 

if(mb_stripos($chtext,"#cap") !==false){
        $ex = explode("#cap",$chtext);
        $tx = $ex[1];
        bot('deleteMessage',[
         'chat_id'=>$channel_id,
         'message_id'=>$channel_mid,
         ]);
         file_put_contents("$channel_id.caption","$tx");
    }
if(mb_stripos($chtext,"#btn") !==false){
        $ex = explode("#btn",$chtext);
        $tx = $ex[1];
        bot('deleteMessage',[
         'chat_id'=>$channel_id,
         'message_id'=>$channel_mid,
         ]);
         file_put_contents("$channel_id.btn","$tx");
    }
 if($chanel_mus){
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$doc_id),true);
$path=$url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.API_KEY.'/'.$path;
$ftitle = $chanel_mus->title;
$fname = $chanel_mus->performer;
$type = strtolower(strrchr($file,'.')); 
$typeee=str_replace('dodasi.com','@'.$muser,$ftitle);
file_put_contents($doc_id.".mp3",file_get_contents($file));
$xajm = fsize(filesize($doc_id.".mp3"));
bot('deletemessage',[ 'chat_id'=>$channel_id, 'message_id'=>$channel_mid ]);
$channel_id = $channel->chat->id;
$size = $chanel_mus->file_size;
$dur12 = $chanel_mus->duration;
$dur = $dur12/60;
$size = $size/1048576;
$coor = explode('.', $size);
$coor2 = substr ($coor['1'], 0, 2);
$coor3 = explode('.', $dur);
 $coor4 = substr ($coor3['1'], 0, 2);
$dur1 = $coor3[0];
$dur2 = $dur1 * 60;
$duri = $dur12 - $dur2;
$size = $coor['0'].'.'.$coor2;
$dur = $coor3['0'].'.'.$coor4;
include("getid3/getid3.php");
$getID3 = new getID3;
$filer = $getID3->analyze($doc_id.".mp3");
$durm = $filer['playtime_string'];
require_once 'phpmp3.php';
//Extract 30 seconds starting after 10 seconds.
$mp3 = new PHPMP3($doc_id.".mp3");
$mp3_1 = $mp3->extract(15,45);
$mp3_1->save('yes.ogg');

bot('sendVoice',[
          'chat_id'=>$channel_id,
'voice'=>new CURLFile("yes.ogg"),
'duration'=>$du,
      'caption'=>"👇Originali Pastda👇\n\n🎵Kanalimiz: @".$muser." dan uzoqlashmang!",
          ]);
$btn = file_get_contents("$channel_id.btn");
if(strlen($btn)>2){
$buton = $btn;
}else{
$buton = "♻️Yuborish";
}
$chcap = file_get_contents("$channel_id.caption");
if(strlen($chcap)>2){
$cap = $chcap;
}else{
$cap = "@$muser kanali uchun";
}
        $tokenn=uniqid("true");
        
$aydi=$channel_mid+2;
$tokenn=uniqid("true");
bot('sendAudio',[
          'chat_id'=>$channel_id,
          'audio'=>new CURLFile($doc_id.".mp3"),
        'title'=>$fname."-".$typeee,
        'performer'=>"@".$muser,
          'thumb'=>$fileid,
      'caption'=>$fname."-".$typeee."\n 💾|" .$xajm."  ⏰|" .$durm."\n\n".$cap,
      'reply_markup'=>json_encode([
      'inline_keyboard'=>[
             [['text'=>"👍", 'callback_data'=>"$tokenn=👍"],['text'=>"👎",'callback_data'=>"$tokenn=👎"]],
       [['text'=>"🔄Do'stlarga ulashish🔄", "url"=>"https://t.me/share/url?url=https://telegram.me/$muser/$aydi"]],
       ]
       ])
     ]);
del($doc_id.".mp3");
del("yes.ogg");
}
if(mb_stripos($data,"=")!==false){ 
$ex=explode("=",$data); 
$calltok=$ex[0]; 
$emoj=$ex[1]; 
$mylike=file_get_contents("like/$calltok.dat"); 
if(mb_stripos($mylike,"$callfrid")!==false){ 
      bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Kechirasiz siz ovoz berib bo'lgansiz!", 
        'show_alert'=>false, 
    ]); 
}else{ 
file_put_contents("like/$calltok.dat","$mylike\n$callfrid=$emoj"); 
$value=file_get_contents("like/$calltok.dat"); 
$lik=substr_count($value,"👍"); 
$des=substr_count($value,"👎"); 
     bot('editMessageReplyMarkup',[ 
        'chat_id'=>$cid2, 
        'message_id'=>$cmid,
        'inline_query_id'=>$qid,
        'reply_markup'=>json_encode([ 
        'inline_keyboard'=>[ 
       [['text'=>"👍 $lik", 'callback_data'=>"$calltok=👍"],['text'=>"👎 $des",'callback_data'=>"$calltok=👎"]], 
       [['text'=>"🔄Do'stlarga ulashish🔄", "url"=>"https://t.me/share/url?url=https://telegram.me/$muser/$aydi"]],
       ] 
       ]) 
       ]);
       bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Ovozingiz qabul qilindi!", 
        'show_alert'=>false, 
    ]);  
  }
}

//kanalga like yoki dslike bosgan odamni maxsus guruhda ko'rsatuvchi funksiya

if((mb_stripos($data,"$calltok=👎")!==false) and (mb_stripos($calluser,"Turkcha_Mp3")!==false)){
bot('SendMessage',[
    'chat_id'=>'-1001200117696',
    'text'=>"📡 Kanal: @$calluser
👤 Foydalanuvchi:: <a href='tg://user?id=$callfrid'>$callfrname</a> 
✍️ Fikri: 👎 $des",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>"true",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"↪Postga borish",'url'=>"https://t.me/$calluser/$cmid"]]
    ]
    ])
  ]);
}
if((mb_stripos($data,"$calltok=👍")!==false) and (mb_stripos($calluser,"Turkcha_Mp3")!==false)){ 
bot('SendMessage',[
    'chat_id'=>'-1001200117696',
    'text'=>"📡 Kanal: @$calluser
👤 Foydalanuvchi: <a href='tg://user?id=$callfrid'>$callfrname</a> 
✍️ Fikri: 👍 $lik",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>"true",
        'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"↪Postga borish",'url'=>"https://t.me/$calluser/$cmid"]]
    ]
    ])
  ]);
}

if((mb_stripos($data,"$calltok=👎")!==false)){
bot('SendMessage',[
    'chat_id'=>'-1001193063303',
    'text'=>"@Mp3_Edit_Robot dan Yangi XABAR
📡 Kanal: @$calluser
👤 Foydalanuvchi: <a href='tg://user?id=$callfrid'>$callfrname</a> 
✍️ Fikri: 👎 $des",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>"true",
        'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"↪Postga borish",'url'=>"https://t.me/$calluser/$cmid"]]
    ]
    ])
  ]);
}
if((mb_stripos($data,"$calltok=👍")!==false)){ 
bot('SendMessage',[
    'chat_id'=>'-1001193063303',
    'text'=>"@Mp3_Edit_Robot dan Yangi XABAR
📡 Kanal: @$calluser
👤 Foydalanuvchi: <a href='tg://user?id=$callfrid'>$callfrname</a> 
✍️ Fikri: 👍 $lik",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>"true",
        'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"↪Postga borish",'url'=>"https://t.me/$calluser/$cmid"]]
    ]
    ])
  ]);
}
$type = $message->chat->type;
if($type =="private"){
$baza = file_get_contents("Azolar.txt");
    if(mb_stripos($baza, $chat_id) !== false){
}else{
file_put_contents("Azolar.txt", "$baza\n$chat_id");
}    
}
if($channel_user){
$dat = file_get_contents("chuser.dat");
if(mb_stripos($dat,$channel_user) !== false){
}else{
file_put_contents("chuser.dat", "$dat\n@$channel_user");
file_put_contents("$channel_id.caption","");
file_put_contents("$channel_id.btn",""); 
}
} if($data=="stat"){
    $stat = file_get_contents("Azolar.txt");
    $count = substr_count($stat,"\n");
     bot('EditMessageText',[
        'chat_id'=>$cid2,
        'message_id'=>$cmid,
    'text'=>"Botimiz a'zolari: $count\n\nTuzuvchi: @Virus8096",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"♻️Yangilash",'callback_data'=>'stat'],['text'=>"↩Orqaga",'callback_data'=>'orqa']],
    ]
    ])
]);
}
$text = $update->message->text;
$inline = $update->inline_query->query;
$url=file_get_contents("https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyBOJixEjLHT78dC1i3cJhSLyJ3OVy2C2GA&type=video&q=$inline");
$yts = json_decode($url);
$tuit = $yts->items[0]->id->videoId;
$tuit_ru = $yts->items[0]->snippet->title;
$coder_c7 =$yts->items[0]->snippet->description;
$infotuit =$yts->items[0]->snippet->thumbnails->high->url; 
if($text == '/topish'){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"Izlash tugmasini bosing ",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Izlash",'switch_inline_query'=>"Voydod.Net"]]
]
])
]);
}
elseif($inline){
    bot('answerInlineQuery', [
        'inline_query_id' => $update->inline_query->id,
        'results' => json_encode([[
            'type' => 'article',
            'id' => base64_encode(rand(5,555)),
            'thumb_url'=>"$infotuit",
            'title' => "$tuit_ru",
            'description'=>"$coder_c7",
            'input_message_content'=>[
            'parse_mode' => 'MarkDown', 
            'message_text' => "https://youtu.be/$tuit"],
         ],
        ])
        ]);
} 


if($text1=="/user"){
    $chus = file_get_contents("chuser.dat");
        $user = file_get_contents("chuser.dat");
    $son = substr_count($user,"\n");
    $son1 = $son - "1";
     bot('sendmessage',[
        'chat_id'=>$chat_id,
    'text'=>"Barcha kanallar useri: $chus \n\nBarcha kanallar:$son ta\n\nTuzuvchi: @Virus8096",
]);
}
$guruh = file_get_contents("Azolar.txt");

if ($text == "/send" and $chat_id==$admin){
bot ('SendMessage', [
'chat_id'=> $cid,
'message_id'=>$mid,
'text'=>"Xabar matnini yuboring:",
'reply_markup'=>json_encode([
'force_reply'=>true 
])
]);
}

if ($reply == "Xabar matnini yuboring:"){
$ex = explode("\n", $guruh);
foreach($ex as $for){
bot ('sendmessage', [
'chat_id'=> $for,
'text'=>$text1,
'parse_mode'=>"html",
]);
}
}