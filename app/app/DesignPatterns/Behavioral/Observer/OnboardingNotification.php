<?php

declare(strict_types=1);

namespace App\DesignPatterns\Behavioral\Observer;

use SplObserver;
use SplSubject;

/**
 * Этот Конкретный Компонент отправляет начальные инструкции новым пользователям.
 * Клиент несёт ответственность за присоединение этого компонента к соответствующему событию создания пользователя.
 */
class OnboardingNotification implements SplObserver
{
    public function __construct(
        private string $adminEmail,
    ) {}

    public function update(SplSubject $repository, string $event = null, mixed $data = null): void
    {
         mail(
             $this->adminEmail,
             "Onboarding required",
             "We have a new user. Here's his info: " . json_encode($data, JSON_THROW_ON_ERROR)
         );

        echo "OnboardingNotification: The notification has been emailed!<br>";
    }
}