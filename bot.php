<?php

include __DIR__.'/vendor/autoload.php';

use Discord\Discord;
use Discord\Parts\Channel\Channel;
use Discord\Parts\Channel\Message;
use Discord\Parts\Embed\Embed;
use Discord\Parts\User\User;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;

$discord = new Discord([
    'token' => 'MTE2NTUwMjM3MTc1ODA4NDI0MA.GxOojq.KUIyj-JdTic0PGw4bukBmwPf6PbqxK_iuGpf-Y',
    'intents' => Intents::getDefaultIntents()
//      | Intents::MESSAGE_CONTENT, // Note: MESSAGE_CONTENT is privileged, see https://dis.gd/mcfaq
]);

$discord->on('ready', function (Discord $discord) {
    echo "Bot is ready!", PHP_EOL;

    // Listen for messages.
    $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
        echo "{$message->author->username}: {$message->content}", PHP_EOL;
        // Note: MESSAGE_CONTENT intent must be enabled to get the content if the bot is not mentioned/DMed.
    });
});

// Xử lý các tin nhắn đến
$discord->on('message', function ($message) {
    // Nếu tin nhắn là lệnh
    if ($message->content === '!ping') {
        // Trả lời lại tin nhắn
        $message->reply('Pong!');
    }

    if ($message->content === '!help'){
        $message->reply('Bot đang thử nghiệm chưa hoàn thiện!');
    }

    // Nếu tin nhắn bắt đầu bằng /speak
    if ($message->content->startsWith('!speak')) {
        $discord = new Discord([
            'token' => 'MTE2NTUwMjM3MTc1ODA4NDI0MA.GxOojq.KUIyj-JdTic0PGw4bukBmwPf6PbqxK_iuGpf-Y'
        ]);
        // Lấy nội dung của tin nhắn
        $content = trim($message->content, '!speak');

        // Tạo đối tượng Embed
        $embed = new Embed();
        $embed->setColor(0x00FF00);
        $embed->setTitle('Nội dung được nói');
        $embed->setDescription($content);

        // Nói nội dung bằng giọng Google
        $discord->voice->speak($content, 'en-US', 'Wavenet');

        // Gửi Embed đến kênh
        $message->channel->sendMessage($embed);
    }

    // Nếu tin nhắn là lệnh verify
    // if ($message->content === '!verify') {
    //     // Tạo bảng nhập thông tin
    //     $embed = new \Discord\Parts\Embed\Embed(
    //         "Xác minh",
    //         "Vui lòng điền thông tin xác minh.",
    //     );
    //     $embed->addField("Tên", "", true);
    //     $embed->addField("Faction", "", true);

    //     // Gửi bảng nhập thông tin cho người dùng
    //     $message->reply($embed);

    //     // Lắng nghe phản hồi của người dùng
    //     $message->channel->on("message", function ($message) {

    //         // Kiểm tra xem người dùng có đang gửi phản hồi cho lệnh verify hay không
    //         if ($message->author != $message->channel->getMember($message->author->id)) {
    //             return;
    //         }

    //         // Lấy thông tin từ phản hồi của người dùng
    //         $name = $message->content;
    //         $mention = $message->mentions[0]->username;

    //         // Kiểm tra xem thông tin đã hợp lệ hay chưa
    //         if (empty($name) || !in_array($mention, $factions)) {
    //             return $message->reply("Vui lòng điền đầy đủ thông tin.");
    //         }

    //         // Cập nhật thông tin người dùng
    //         $message->author->setNickname($name);
    //         $message->author->setColor($factionColors[$mention]);

    //         // Thông báo xác minh thành công
    //         $message->reply("Xác minh thành công! Tên của bạn hiện là $name, faction của bạn là $mention.");
    //     });
    // }
});

$discord->run();