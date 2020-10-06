<?php


namespace DeckBuilder\Controller;


class LogoutController
{
    /**
     *
     */
    public function logout(): void
    {
        session_start();
        session_destroy();
        unset($_SESSION["username"]);
        header('Location:http://localhost:8000/cards');
    }
}