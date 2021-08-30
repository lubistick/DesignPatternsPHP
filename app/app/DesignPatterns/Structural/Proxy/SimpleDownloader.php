<?php

declare(strict_types=1);

/**
 * Реальный Субъект делает реальную работу, хотя и не самым эффективным способом.
 * Когда клиент пытается загрузить тот же самый файл во второй раз,
 * наш загрузчик именно это и делает, вместо того, чтобы извлечь результат из кэша.
 */
namespace App\DesignPatterns\Structural\Proxy;

class SimpleDownloader implements Downloader
{
    public function download(string $url): string
    {
        echo "Downloading a file from the Internet.<br>";
        $result = file_get_contents($url);
        echo "Downloaded bytes: " . strlen($result) . "<br>";

        return $result;
    }
}
