<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Bridge;

use App\DesignPatterns\Structural\Bridge\Pages\Page;
use App\DesignPatterns\Structural\Bridge\Pages\ProductPage;
use App\DesignPatterns\Structural\Bridge\Pages\SimplePage;
use App\DesignPatterns\Structural\Bridge\Renderers\HtmlRenderer;
use App\DesignPatterns\Structural\Bridge\Renderers\JsonRenderer;

/**
 * Клиентский код имеет дело только с объектами Абстракции.
 */
function clientCode(Page $page): void
{
    // ...
    echo $page->view();
    // ...
}

/**
 * Клиентский код может выполняться с любой предварительно сконфигурированной комбинацией Абстракция + Реализация.
 */
$htmlRenderer = new HtmlRenderer();
$jsonRenderer = new JsonRenderer();

$page = new SimplePage(renderer: $htmlRenderer, title: 'Home', content: 'Welcome to our website!');
echo "HTML view of a SIMPLE content page:\n\n";
clientCode($page);
echo "\n\n";

/**
 * При необходимости Абстракция может заменить связанную Реализацию во время выполнения.
 */
$page->changeRenderer(renderer: $jsonRenderer);
echo "JSON view of a SIMPLE content page:\n\n";
clientCode($page);
echo "\n\n";

$product = new Product(
    id: '123',
    title: 'Star Wars, episode 1',
    description: 'A long time ago in a galaxy far, far away...',
    image: '/images/star-wars.jpg',
    price: 39.95,
);

$page = new ProductPage(renderer: $htmlRenderer, product: $product);
echo "HTML view of a PRODUCT page:\n\n";
clientCode($page);
echo "\n\n";

$page->changeRenderer(renderer: $jsonRenderer);
echo "JSON view of a PRODUCT page:\n\n";
clientCode($page);
