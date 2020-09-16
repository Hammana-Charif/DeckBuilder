<?php


namespace DeckBuilder\Service\Http;


class ClientService
{
    public function get(string $url): string
    {
        return file_get_contents($url);
    }
}