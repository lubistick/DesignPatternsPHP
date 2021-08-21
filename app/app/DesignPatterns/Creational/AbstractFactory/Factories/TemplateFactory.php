<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\Factories;

use App\DesignPatterns\Creational\AbstractFactory\Renderers\Renderer;
use App\DesignPatterns\Creational\AbstractFactory\Templates\PageTemplate;
use App\DesignPatterns\Creational\AbstractFactory\Templates\TitleTemplate;

/**
 * Интерфейс Абстрактной фабрики объявляет создающие методы для каждого
 * определённого типа продукта.
 */
interface TemplateFactory
{
    public function createTitleTemplate(): TitleTemplate;

    public function createPageTemplate(): PageTemplate;

    public function getRenderer(): Renderer;
}
