<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\Factories;

use App\DesignPatterns\Creational\AbstractFactory\Renderers\PHPRenderer;
use App\DesignPatterns\Creational\AbstractFactory\Renderers\Renderer;
use App\DesignPatterns\Creational\AbstractFactory\Templates\PageTemplate;
use App\DesignPatterns\Creational\AbstractFactory\Templates\PHPPageTemplate;
use App\DesignPatterns\Creational\AbstractFactory\Templates\PHPTitleTemplate;
use App\DesignPatterns\Creational\AbstractFactory\Templates\TitleTemplate;

/**
 * А эта Конкретная Фабрика создает шаблоны PHPTemplate.
 */
class PHPTemplateFactory implements TemplateFactory
{
    public function createTitleTemplate(): TitleTemplate
    {
        return new PHPTitleTemplate();
    }

    public function createPageTemplate(): PageTemplate
    {
        return new PHPPageTemplate($this->createTitleTemplate());
    }

    public function getRenderer(): Renderer
    {
        return new PHPRenderer();
    }
}
