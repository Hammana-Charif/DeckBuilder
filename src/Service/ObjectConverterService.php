<?php


namespace DeckBuilder\Service;


use stdClass;

class ObjectConverterService
{
    /**
     * @param string $stringContent
     * @return mixed
     */
    public function convertToObject(string $stringContent): stdClass
    {
       return json_decode($stringContent);
    }
}