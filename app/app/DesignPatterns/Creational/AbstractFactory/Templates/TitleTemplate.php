<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\Templates;

/**
 * Каждый отдельный тип продукта должен иметь отдельный интерфейс. Все варианты
 * продукта должны соответствовать одному интерфейсу.
 *
 * Например, этот интерфейс Абстрактного Продукта описывает поведение шаблонов
 * заголовков страниц.
 */
interface TitleTemplate
{
    public function getTemplateString(): string;
}
