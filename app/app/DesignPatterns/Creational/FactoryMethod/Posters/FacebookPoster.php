<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\FactoryMethod\Posters;

use App\DesignPatterns\Creational\FactoryMethod\Connectors\FacebookConnector;
use App\DesignPatterns\Creational\FactoryMethod\Connectors\SocialNetworkConnector;

/**
 * Этот Конкретный Создатель поддерживает Facebook. Помните, что этот класс
 * также наследует метод post от родительского класса. Конкретные Создатели —
 * это классы, которые фактически использует Клиент.
 */
class FacebookPoster extends SocialNetworkPoster
{
    public function __construct(
        private string $login,
        private string $password,
    ) {}

    public function getSocialNetwork(): SocialNetworkConnector
    {
        return new FacebookConnector($this->login, $this->password);
    }
}
