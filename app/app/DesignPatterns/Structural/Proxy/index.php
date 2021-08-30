<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Proxy;

/**
 * Клиентский код может выдать несколько похожих запросов на загрузку.
 * В этом случае кэширующий заместитель экономит время и трафик, подавая результаты из кэша.
 * Клиент не знает, что он работает с заместителем, потому что он работает с загрузчиками через абстрактный интерфейс.
 *
 * Наиболее распространёнными областями применения паттерна Заместитель являются ленивая загрузка,
 * кэширование, контроль доступа, ведение журнала и т.д.
 * Заместитель может выполнить одну из этих задач, а затем, в зависимости от результата,
 * передать выполнение одноимённому методу в связанном объекте класса Реального Субъект.
 */
function clientCode(Downloader $subject): void
{
    // ...
    $result = $subject->download('http://example.com/');
    // Повторяющиеся запросы на загрузку могут кэшироваться для увеличения скорости.
    $result2 = $subject->download('http://example.com/');
    // ...
}

echo "Executing client code with real subject:<br>";
$realSubject = new SimpleDownloader();
clientCode($realSubject);

echo "<br>";

echo "Executing the same client code with a proxy:<br>";
$proxy = new CachingDownloader($realSubject);
clientCode($proxy);
