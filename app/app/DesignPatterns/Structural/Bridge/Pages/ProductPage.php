<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Bridge\Pages;

use App\DesignPatterns\Structural\Bridge\Product;
use App\DesignPatterns\Structural\Bridge\Renderers\Renderer;

/**
 * Эта Конкретная Абстракция создаёт более сложную страницу.
 */
class ProductPage extends Page
{
    public function __construct(
        Renderer $renderer,
        protected Product $product,
    ) {
        parent::__construct($renderer);
    }

    public function view(): string
    {
        return $this->renderer->renderParts([
            $this->renderer->renderHeader(),
            $this->renderer->renderTitle(title: $this->product->getTitle()),
            $this->renderer->renderTextBlock(text: $this->product->getDescription()),
            $this->renderer->renderImage(url: $this->product->getImage()),
            $this->renderer->renderLink(url: '/cart/add/' . $this->product->getId(), title: 'Add to cart'),
            $this->renderer->renderFooter(),
        ]);
    }
}
