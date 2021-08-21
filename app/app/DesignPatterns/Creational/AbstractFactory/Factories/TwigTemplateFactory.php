<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\Factories;

use App\DesignPatterns\Creational\AbstractFactory\Renderers\Renderer;
use App\DesignPatterns\Creational\AbstractFactory\Renderers\TwigRenderer;
use App\DesignPatterns\Creational\AbstractFactory\Templates\PageTemplate;
use App\DesignPatterns\Creational\AbstractFactory\Templates\TitleTemplate;
use App\DesignPatterns\Creational\AbstractFactory\Templates\TwigPageTemplate;
use App\DesignPatterns\Creational\AbstractFactory\Templates\TwigTitleTemplate;

/**
 * Каждая Конкретная Фабрика соответствует определённому варианту (или
 * семейству) продуктов.
 *
 * Эта Конкретная Фабрика создает шаблоны Twig.
 */
class TwigTemplateFactory implements TemplateFactory
{
    public function createTitleTemplate(): TitleTemplate
    {
        return new TwigTitleTemplate();
    }

    public function createPageTemplate(): PageTemplate
    {
        return new TwigPageTemplate($this->createTitleTemplate());
    }

    public function getRenderer(): Renderer
    {
        return new TwigRenderer();
    }
}
