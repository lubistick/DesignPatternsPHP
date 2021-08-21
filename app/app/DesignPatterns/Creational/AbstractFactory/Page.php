<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory;

use App\DesignPatterns\Creational\AbstractFactory\Factories\TemplateFactory;

/**
 * Клиентский код. Обратите внимание, что он принимает класс Абстрактной Фабрики
 * в качестве параметра, что позволяет клиенту работать с любым типом конкретной
 * фабрики.
 */
class Page
{
    public function __construct(
        public string $title,
        public string $content,
    ) {}

    /**
     * Вот как вы бы использовали этот шаблон в дальнейшем. Обратите внимание,
     * что класс страницы не зависит ни от классов шаблонов, ни от классов отрисовки.
     */
    public function render(TemplateFactory $factory): string
    {
        $pageTemplate = $factory->createPageTemplate();

        $renderer = $factory->getRenderer();

        return $renderer->render($pageTemplate->getTemplateString(), [
            'title' => $this->title,
            'content' => $this->content,
        ]);
    }
}
