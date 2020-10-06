<?php


namespace DeckBuilder\Repository;



Interface RepositoryInterface
{
    /**
     * @return array
     */
    public function select(): array;
}