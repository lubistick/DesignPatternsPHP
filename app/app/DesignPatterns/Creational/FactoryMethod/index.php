<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\FactoryMethod;

use App\DesignPatterns\Creational\FactoryMethod\Posters\FacebookPoster;
use App\DesignPatterns\Creational\FactoryMethod\Posters\LinkedInPoster;
use App\DesignPatterns\Creational\FactoryMethod\Posters\SocialNetworkPoster;

/**
 * В этом примере паттерн Фабричный Метод предоставляет интерфейс для создания коннекторов к социальным сетям,
 * которые могут быть использованы для входа в сеть, создания сообщений и, возможно, выполнения других действий.
 * И всё это без привязки клиентского кода к определённым классам конкретной социальной сети.
 *
 * Клиентский код может работать с любым подклассом SocialNetworkPoster, так как
 * он не зависит от конкретных классов.
 *
 * @see https://refactoring.guru/ru/design-patterns/factory-method
 */
function clientCode(SocialNetworkPoster $poster)
{
    //...
    $poster->post("Hello world!");
    $poster->post("I had a large hamburger this morning!");
    //...
}

/**
 * На этапе инициализации приложение может выбрать, с какой социальной сетью оно
 * хочет работать, создать объект соответствующего подкласса и передать его
 * клиентскому коду.
 */
echo "Testing FacebookPoster:<br>";
clientCode(new FacebookPoster('john_smith', '******'));
echo "<br>";

echo "Testing LinkedInPoster:<br>";
clientCode(new LinkedInPoster('john_smith@example.com', '******'));
