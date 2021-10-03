<?php

declare(strict_types=1);

namespace Tests\DesignPatterns\Structural\Proxy;

use App\DesignPatterns\Structural\Proxy\CachingDownloader;
use App\DesignPatterns\Structural\Proxy\SimpleDownloader;
use PHPUnit\Framework\TestCase;

class DownloaderTest extends TestCase
{
    public function testDownload(): void
    {
        $downloader = new SimpleDownloader();
        $url = __DIR__ . '/content.txt';
        $result = $downloader->download($url);
        $expected = "This is content for the test.";

        $this->assertSame($expected, $result);
    }

    public function testCache(): void
    {
        $downloader = new CachingDownloader(new SimpleDownloader());
        $url = __DIR__ . '/content.txt';
        $downloader->download($url);
        $expected = "This is content for the test.";
        $result = $downloader->getCacheByUrl($url);

        $this->assertSame($expected, $result);
    }
}
