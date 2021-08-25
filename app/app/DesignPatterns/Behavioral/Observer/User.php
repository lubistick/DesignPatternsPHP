<?php

declare(strict_types=1);

namespace App\DesignPatterns\Behavioral\Observer;

/**
 * Давайте сохраним класс Пользователя тривиальным, так как он не является главной темой нашего примера.
 */
class User
{
    public array $attributes = [];

    public function update(array $data): void
    {
        $this->attributes = array_merge($this->attributes, $data);
    }
}
