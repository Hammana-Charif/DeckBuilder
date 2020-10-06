<?php


namespace DeckBuilder\Controller;


use DeckBuilder\Service\Builder\DeckBuilderService;

class DeckController extends Controller
{
    /**
     * @param $id
     */
    public function showDeck($id) {
        $deckList = (new DeckBuilderService())->build($id);
        $this->render("deck/deckCreate.htm.php", [
            "deckList" => $deckList["deckList"],
        ]);
    }
}