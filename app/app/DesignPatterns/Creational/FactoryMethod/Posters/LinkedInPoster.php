<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\FactoryMethod\Posters;

use App\DesignPatterns\Creational\FactoryMethod\Connectors\LinkedInConnector;
use App\DesignPatterns\Creational\FactoryMethod\Connectors\SocialNetworkConnector;

/**
 * Этот Конкретный Создатель поддерживает LinkedIn.
 */
class LinkedInPoster extends SocialNetworkPoster
{
    public function __construct(
        private string $email,
        private string $password,
    ) {}

    public function getSocialNetwork(): SocialNetworkConnector
    {
        return new LinkedInConnector($this->email, $this->password);
    }
}
