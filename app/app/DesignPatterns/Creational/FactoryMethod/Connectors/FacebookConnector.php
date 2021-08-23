<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\FactoryMethod\Connectors;

/**
 * Этот Конкретный Продукт реализует API Facebook.
 */
class FacebookConnector implements SocialNetworkConnector
{
    public function __construct(
        private string $login,
        private string $password,
    ) {}

    public function logIn(): void
    {
        echo "Send HTTP API request to log in user $this->login with password $this->password<br>";
    }

    public function logOut(): void
    {
        echo "Send HTTP API request to log out user $this->login<br>";
    }

    public function createPost(string $content): void
    {
        echo "Send HTTP API requests to create a post in Facebook timeline with content: $content<br>";
    }
}
