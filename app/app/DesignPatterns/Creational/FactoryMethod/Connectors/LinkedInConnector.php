<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\FactoryMethod\Connectors;

/**
 * А этот Конкретный Продукт реализует API LinkedIn.
 */
class LinkedInConnector implements SocialNetworkConnector
{
    public function __construct(
        private string $email,
        private string $password,
    ) {}

    public function logIn(): void
    {
        echo "Send HTTP API request to log in user $this->email with password $this->password<br>";
    }

    public function logOut(): void
    {
        echo "Send HTTP API request to log out user $this->email<br>";
    }

    public function createPost(string $content): void
    {
        echo "Send HTTP API requests to create a post in LinkedIn timeline with content: $content<br>";
    }
}
