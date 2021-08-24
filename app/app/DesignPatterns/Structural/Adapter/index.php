<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Adapter;

/**
 * Клиентский код работает с классами, которые следуют Целевому интерфейсу.
 *
 * @see https://refactoring.guru/ru/design-patterns/adapter
 */
function clientCode(Notification $notification)
{
    //...
    $notification->send(
        "Website is down!",
        "<strong style='color:red;'>Alert!</strong> " .
            "Our website is not responding. Call admins and bring it up!"
    );
    //...
}

echo "Client code is designed correctly and works with email notifications:<br>";
$notification = new EmailNotification("developers@example.com");
clientCode($notification);
echo "<br><br>";

echo "The same client code can work with other classes via adapter:<br>";
$slackApi = new SlackApi("example.com", "XXXXXX");
$notification = new SlackNotification($slackApi, "Example.com Developers");
clientCode($notification);
