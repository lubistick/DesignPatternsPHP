<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Adapter;

/**
 * Целевой интерфейс предоставляет интерфейс, которому следуют классы вашего приложения.
 */
interface Notification
{
    public function send(string $title, string $message): void;
}
