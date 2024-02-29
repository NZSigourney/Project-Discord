<?php

include __DIR__.'/vendor/autoload.php';

use Discord\Discord;
use Discord\Parts\Channel\Channel;
use Discord\Parts\Channel\Message;
use Discord\Parts\Embed\Embed;
use Discord\Parts\User\Member;
use Discord\Parts\User\User;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;

$discord = new Discord([
    'token' => 'MTE2NTUwMjM3MTc1ODA4NDI0MA.GkI4uB.2aGIdHh7-PUposa_pW7ChKSS2kTCJVTYe5w4Cc',
    // 'intents' => [
    //     Intents::GUILDS, Intents::GUILD_BANS
    // ],
    'intents' => Intents::getDefaultIntents()
//      | Intents::MESSAGE_CONTENT, // Note: MESSAGE_CONTENT is privileged, see https://dis.gd/mcfaq
]);

$discord->on('ready', function (Discord $discord) {
    echo "Bot is ready!", PHP_EOL;

    // Listen for messages.
    // $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
    //     echo "{$message->author->username}: {$message->content}", PHP_EOL;
    //     // Note: MESSAGE_CONTENT intent must be enabled to get the content if the bot is not mentioned/DMed.
    // });
});

// Đăng ký sự kiện khi có một kênh văn bản được tạo
$discord->on(Event::CHANNEL_CREATE, function ($data, Discord $discord) {
    // Lấy thông tin người tạo kênh
    // $author = $data->author->username;
    $guildId = $data->guild_id;
    $memberId = $data->user_id;
    $mention = "<@{$memberId}>";
    // Lấy tên kênh văn bản mới được tạo
    $channelName = $data->channel->name;
    // Gửi tin nhắn thông báo vào kênh text có ID là '1193457321733541948'
    $discord->getChannel('1193457321733541948')->sendMessage("$mention đã tạo một kênh text mới: $channelName");
});

// Đăng ký sự kiện khi có một kênh văn bản được cập nhật
$discord->on(Event::CHANNEL_UPDATE, function ($data, Discord $discord) {
    // Lấy thông tin người cập nhật kênh
    $author = $data->author->username;
    // Lấy tên kênh văn bản đã được cập nhật
    $channelName = $data->channel->name;
    // Gửi tin nhắn thông báo vào kênh text có ID là '1193457321733541948'
    $discord->getChannel('1193457321733541948')->sendMessage("$author đã cập nhật kênh text: $channelName");
});

// Đăng ký sự kiện khi có một kênh văn bản bị xóa
$discord->on(Event::CHANNEL_DELETE, function ($data, Discord $discord) {
    // Lấy thông tin người xóa kênh
    $author = $data->author->username;
    // Lấy tên kênh văn bản đã bị xóa
    $channelName = $data->channel->name;
    // Gửi tin nhắn thông báo vào kênh text có ID là '1193457321733541948'
    $discord->getChannel('1193457321733541948')->sendMessage("$author đã xóa kênh text: $channelName");
});


// Xử lý các tin nhắn đến
$discord->on('message', function (Message $message) {
    if ($message->content === '!help'){
        $message->reply('Bot đang thử nghiệm chưa hoàn thiện!');
    }

    if ($message->content === 'Long' || $message->content == "long") {
        $message->reply('sủa đi cưng');
    }
});

$discord->run();