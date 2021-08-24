<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Adapter;

/**
 * Адаптер – класс, который связывает Целевой интерфейс и Адаптируемый класс.
 * Это позволяет приложению использовать Slack API для отправки уведомлений.
 */
class SlackNotification implements Notification
{
    public function __construct(
        private SlackApi $slackApi,
        private string $chatId,
    ) {}

    /**
     * Адаптер способен адаптировать интерфейсы и преобразовывать входные данные в формат,
     * необходимый Адаптируемому классу.
     */
    public function send(string $title, string $message): void
    {
        $slackMessage = "#" . $title . "# " . strip_tags($message);
        $this->slackApi->logIn();
        $this->slackApi->sendMessage($this->chatId, $slackMessage);
    }
}
