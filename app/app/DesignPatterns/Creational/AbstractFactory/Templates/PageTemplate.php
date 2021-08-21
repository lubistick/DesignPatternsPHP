<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\Templates;

/**
 * Это еще один тип Абстрактного Продукта, который описывает шаблоны целых
 * страниц.
 */
interface PageTemplate
{
    public function getTemplateString(): string;
}
