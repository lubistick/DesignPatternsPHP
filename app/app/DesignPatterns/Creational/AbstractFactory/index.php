<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory;

use App\DesignPatterns\Creational\AbstractFactory\Factories\PHPTemplateFactory;
use App\DesignPatterns\Creational\AbstractFactory\Factories\TwigTemplateFactory;

/**
 * Теперь в других частях приложения клиентский код может принимать фабричные
 * объекты любого типа.
 *
 * @see https://refactoring.guru/ru/design-patterns/abstract-factory
 */
$page = new Page('Заголовок', 'Тело страницы.');

echo "Рендерим с помощью PHPTemplateFactory:";
echo $page->render(new PHPTemplateFactory());

echo "Рендерим с помощью TwigTemplateFactory:";
echo $page->render(new TwigTemplateFactory());
