<?php


namespace DeckBuilder\Controller;


class Controller
{
    protected string $templatePath  = __DIR__ . "/../../templates/";

    /**
     * @param string $pathName
     * @param array $values
     */
    public function render(string $pathName, array $values)
    {
        extract($values);
        include $this->templatePath . $pathName;
    }
}