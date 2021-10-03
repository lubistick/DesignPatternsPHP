<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Bridge\Pages;

use App\DesignPatterns\Structural\Bridge\Renderers\Renderer;

/**
 * Абстракция.
 */
abstract class Page
{
    public function __construct(
        protected Renderer $renderer,
    ) {
    }

    /**
     * Поведение "вида" остаётся абстрактным, так как оно предоставляется только классами Конкретной Абстракции.
     */
    abstract public function view(): string;

    /**
     * Паттерн Мост позволяет динамически заменять присоединённый объект Реализации.
     */
    public function changeRenderer(Renderer $renderer): void
    {
        $this->renderer = $renderer;
    }
}
