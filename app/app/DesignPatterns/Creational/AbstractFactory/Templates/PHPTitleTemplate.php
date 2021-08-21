<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\Templates;

/**
 * А этот Конкретный Продукт предоставляет шаблоны заголовков страниц
 * PHPTemplate.
 */
class PHPTitleTemplate implements TitleTemplate
{
    public function getTemplateString(): string
    {
        return "<h1><?= \$title; ?></h1>";
    }
}
