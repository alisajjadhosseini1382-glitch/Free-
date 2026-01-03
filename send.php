<?php
$botToken = "8574735715:AAFGBCHdvA1MMl1INI_uwGJ190pM978GU0Q";
$chatId   = "76082017506";

$data = json_decode(file_get_contents("php://input"), true);

$email    = $data["email"];
$name     = $data["name"];
$ffid     = $data["ffid"];
$telegram = $data["telegram"];

$text = "🎉 شرکت‌کننده جدید\n\n"
      . "📧 ایمیل: $email\n"
      . "👤 نام کاربری: $name\n"
      . "🎮 Free Fire ID: $ffid\n"
      . "📱 تلگرام: $telegram";

$url = "https://api.telegram.org/bot$botToken/sendMessage";

$params = [
  "chat_id" => $chatId,
  "text" => $text
];

$options = [
  "http" => [
    "method"  => "POST",
    "header"  => "Content-Type: application/json",
    "content" => json_encode($params)
  ]
];

file_get_contents($url, false, stream_context_create($options));
echo json_encode(["ok"=>true]);