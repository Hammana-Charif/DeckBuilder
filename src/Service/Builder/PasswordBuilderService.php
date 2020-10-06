<?php


namespace DeckBuilder\Service\Builder;


use DeckBuilder\Entity\User\Password;

class PasswordBuilderService implements BuilderInterface
{
    /**
     * @return Password
     */
    public function build(): Password
    {
        $password = new Password();
        $passwordValue = (string)(filter_input(INPUT_POST, "password"));

        if (!property_exists($passwordValue, "password")) {
            $passwordValue = "";
        }
        $password->setPassword($passwordValue);
        return $password;
    }
}