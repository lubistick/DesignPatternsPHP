<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\Renderers;

/**
 * Отрисовщик шаблонов Twig.
 */
class TwigRenderer implements Renderer
{
    public function render(string $templateString, array $arguments = []): string
    {
        $twig = new \Twig_Environment(new \Twig_Loader_String());

        return $twig->render($templateString, $arguments);
    }
}
