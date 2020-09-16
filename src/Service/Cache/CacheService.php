<?php


namespace DeckBuilder\Service\Cache;


class CacheService
{
    public function putInCache($path, $contentArray)
    {
        return file_put_contents($path, $contentArray);
    }
}