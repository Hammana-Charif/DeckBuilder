<?php


namespace DeckBuilder\Service\Cache;


use DeckBuilder\Service\Http\ClientService;

class CacheService
{
    /**
     * @param $path
     * @param $contentArray
     * @return false|int
     */
    public function putInCache($path, $contentArray)
    {
        return file_put_contents($path, $contentArray);
    }

    /**
     * @param ClientService $call
     * @param string $fileName
     * @param string $url
     * @return string
     */
    public function createOrLinkTheCache(ClientService $call, string $url, string $fileName)
    {
        $rightPath = __DIR__ . "/../../../var/cache/$fileName";
        if (!file_exists($rightPath)) {
            $content = $call->link($url);
            $this->putInCache($rightPath, $content);
            return $content;
        } else {
            return $content = $call->link($rightPath);
        }
    }
}