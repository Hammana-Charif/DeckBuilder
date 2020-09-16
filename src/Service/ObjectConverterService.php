<?php


namespace DeckBuilder\Service;


use DeckBuilder\Service\Http\ClientService;

class ObjectConverterService
{
    public function convertToObject($stringContent)
    {
       return json_decode($stringContent);
    }
}