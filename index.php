<?php
ob_start();
define('API_KEY','267666272:AAH7VOrUfvmI3j7zkF0rQgzywZ04dj1Onyc');
$admin = "200546170";
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
$editm = $update->edited_message;
$mid = $message->message_id;
$chat_id = $message->chat->id;
$text1 = $message->text;
$fadmin = $message->from->id;
$file_o = __DIR__.'/users/'.$mid.'.json';
file_put_contents($file_o,json_encode($update->message->text));
chmod($file_o,0777);
if (isset($update->edited_message)){
  //$chat_id1 = $editm->chat->id;
  $eid = $editm->message_id;
  $edname = $editm->from->first_name;
  $jsu = json_decode(file_get_contents(__DIR__.'/users/'.$eid.'.json'));
  $text = "<code>یه بویی میاد🤔</code>\n<code>انگار باز یکی ادیت کرده😁</code>\n<code>الان مچشو میگیرم😂</code>\n<code>پیداش کردم عاغا</code>\n<b>".$edname."</b>\n<code>ادیت کرده این متنو قبلا گفته بود</code>\n<code>".$jsu."</code>\n<code>گفتی</code>
<code>".$jsu."</code>";
  $id = $update->edited_message->chat->id;
  bot('sendmessage',[
    'chat_id'=>$id,
    'reply_to_message_id'=>$eid,
    'text'=>$text,
    'parse_mode'=>'html'
  ]);
  $file_o = __DIR__.'/users/'.$eid.'.json';
  file_put_contents($file_o,json_encode($update->edited_message->text));
  //$up = file_get_contents(__DIR__.'/users/'.$eid.'.json');
  //str_replace("edited_message","message",$up);
}elseif(preg_match('/^\/([Ss]tart)/',$text1)){
  $text = "به ربات ادیت نکن\nخوش آمدید\nبرای اد کردن من به گروه بر روی لینک زیر بزنید";
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$text,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       [
        ['text'=>'برای اد کردن تو گروه کیلیک کن','url'=>'https://telegram.me/edit_nakonbot?startgroup=new']
       ],
	   [
        ['text'=>'سازندگان','url'=>'https://telegram.me/TeleSpeedTG']
       ],
	   [
        ['text'=>'امیرحسین','url'=>'https://telegram.me/veryg0odebot']
       ],
       [
        ['text'=>'محمد','url'=>'https://telegram.me/POKER_SOFT']
       ],
       [
          ['text'=>'TeleSpeed','url'=>'https://telegram.me/TeleSpeedTg']
        ]
      ]
    ])
  ]);
}elseif( $fadmin == $admin |  $fadmin == $admin2 and $update->message->text == 'امار'){
    $txtt = file_get_contents('member.txt');
    $member_id = explode("\n",$txtt);
    $mmemcount = count($member_id) -1;
  bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"کاربران : $mmemcount 👤 "
    ]);

}elseif(isset($update->message-> new_chat_member )){
bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"سلام✋\nمن اومدم جاسوسی😎\nجاسوسیه کسانی که پیام شونو ادیت میکنند تاکسی نفهمه😱\nبه نفعته ادیت نکنی من لوت میدم"
    ]);
}
  
  
  
  
  
  
  
$txxt = file_get_contents('member.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($chat_id,$pmembersid)){
      $aaddd = file_get_contents('member.txt');
      $aaddd .= $chat_id."\n";
      file_put_contents('member.txt',$aaddd);
    }
