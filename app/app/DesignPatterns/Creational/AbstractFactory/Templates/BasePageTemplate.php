<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\Templates;

/**
 * Шаблон страниц использует под-шаблон заголовков, поэтому мы должны
 * предоставить способ установить объект для этого под-шаблона. Абстрактная
 * фабрика позаботится о том, чтобы подать сюда под-шаблон подходящего типа.
 */
abstract class BasePageTemplate implements PageTemplate
{
    public function __construct(
        protected TitleTemplate $titleTemplate
    ) {}
}
