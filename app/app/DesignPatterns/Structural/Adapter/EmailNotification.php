<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Adapter;

/**
 * Вот пример существующего класса, который следует за целевым интерфейсом.
 *
 * Дело в том, что у большинства приложений нет чётко определённого интерфейса.
 * В этом случае лучше было бы расширить Адаптер за счёт существующего класса приложения.
 * Если это неудобно (например, SlackNotification не похож на подкласс EmailNotification),
 * тогда первым шагом должно быть извлечение интерфейса.
 */
class EmailNotification implements Notification
{
    public function __construct(
        private string $adminEmail,
    ) {}

    public function send(string $title, string $message): void
    {
        mail($this->adminEmail, $title, $message);
        echo "Sent email with title '$title' to '{$this->adminEmail}' that says '$message'.";
    }
}
