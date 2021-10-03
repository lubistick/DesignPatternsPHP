<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Bridge\Pages;

use App\DesignPatterns\Structural\Bridge\Renderers\Renderer;

/**
 * Эта Конкретная Абстракция создаёт простую страницу.
 */
class SimplePage extends Page
{
    public function __construct(
        Renderer $renderer,
        protected string $title,
        protected string $content,
    ) {
        parent::__construct($renderer);
    }

    public function view(): string
    {
        return $this->renderer->renderParts([
            $this->renderer->renderHeader(),
            $this->renderer->renderTitle(title: $this->title),
            $this->renderer->renderTextBlock(text: $this->content),
            $this->renderer->renderFooter(),
        ]);
    }
}
