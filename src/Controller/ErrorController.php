<?php


namespace DeckBuilder\Controller;


use DeckBuilder\Service\Error\ErrorService;

class ErrorController
{
    /**
     * @param $statusCode
     */
    public function showError($statusCode)
    {
        $errorService = new ErrorService();
        $errorService->setError($statusCode);
        include __DIR__ . '/../../templates/error/error.html.php';
    }

    /**
     * @param int $currentPage
     * @param int $pages
     */
    public function invalidPage(int $currentPage, int $pages):void
    {
        if ($currentPage <= 0 || $currentPage > $pages) {
            $this->showError(404);
        }
    }
}