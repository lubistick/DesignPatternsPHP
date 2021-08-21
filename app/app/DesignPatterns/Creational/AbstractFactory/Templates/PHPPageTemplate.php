<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\Templates;

/**
 * Вариант шаблонов страниц PHPTemplate.
 */
class PHPPageTemplate extends BasePageTemplate
{
    public function getTemplateString(): string
    {
        $renderedTitle = $this->titleTemplate->getTemplateString();

        return <<<HTML
        <div class="page">
            $renderedTitle
            <article class="content"><?= \$content; ?></article>
        </div>
        HTML;
    }
}
