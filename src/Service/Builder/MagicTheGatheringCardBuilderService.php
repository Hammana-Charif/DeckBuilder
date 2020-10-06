<?php


namespace DeckBuilder\Service\Builder;


use DeckBuilder\Repository\CardRepository;

class MagicTheGatheringCardBuilderService
{
    /**
     * @param $color
     * @param $id
     * @return array
     */
    public function build($color, $id): array
    {
        $cardRepository = new CardRepository();
        $currentPage = $cardRepository->currentPage();
        $perPage = $cardRepository->perPage();
        $pages = $cardRepository->pages();
        $cardsList = $cardRepository->selectWithPagination($currentPage, $perPage, $pages);

        if (null !== $id) {
            $this->build($id, $cardsList);
        }

        if (null !== $color) {
            $pages = $cardRepository->filterPages($color);
            $cardsList = $cardRepository->selectByColor($currentPage, $perPage, $pages, $color);
        }
        return $choiceList = ["currentPage" => $currentPage, "pages" => $pages, "cardsList" => $cardsList, "color" => $color];
    }
}