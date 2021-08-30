<?php

declare(strict_types=1);

namespace App\DesignPatterns\Behavioral\Iterator;

/**
 * Клиентский код.
 */
$csv = new CsvIterator(__DIR__ . '/cats.csv');

foreach ($csv as $row) {
    echo '<pre>';
    print_r($row);
    echo '</pre>';
}
