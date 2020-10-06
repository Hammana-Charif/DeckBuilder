<?php


namespace DeckBuilder\Service\Http;


class ClientService
{
    /**
     * @param string $link
     * @return string
     */
    public function link(string $link): string
    {
        return file_get_contents($link);
    }
}