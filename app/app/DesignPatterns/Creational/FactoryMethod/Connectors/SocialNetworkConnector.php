<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\FactoryMethod\Connectors;

/**
 * Интерфейс Продукта объявляет поведения различных типов продуктов.
 */
interface SocialNetworkConnector
{
    public function logIn(): void;

    public function logOut(): void;

    public function createPost(string $content): void;
}
