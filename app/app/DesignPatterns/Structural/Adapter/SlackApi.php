<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Adapter;

/**
 * Адаптируемый класс – некий полезный класс, несовместимый с целевым интерфейсом.
 * Нельзя просто войти и изменить код класса так, чтобы следовать целевому интерфейсу,
 * так как код может предоставляться сторонней библиотекой.
 */
class SlackApi
{
    public function __construct(
        private string $login,
        private string $apiKey,
    ) {}

    public function logIn(): void
    {
        // Send authentication request to Slack web service.
        echo "Logged in to a slack account '{$this->login}' and API key '{$this->apiKey}'<br>";
    }

    public function sendMessage(string $chatId, string $message): void
    {
        // Send message post request to Slack web service.
        echo "Posted following message into the '$chatId' chat: '$message'.<br>";
    }
}
