<?php


namespace DeckBuilder\Service\Builder;


use DeckBuilder\Entity\User\Email;

class EmailBuilderService implements BuilderInterface
{
    /**
     * @return Email
     */
    public function build(): Email
    {
        $email = new Email();
        $emailValue = (string)(filter_input(INPUT_POST, "email"));

        if (!property_exists($emailValue, "email")) {
            $emailValue = "";
        }
        $email->setEmail($emailValue);
        return $email;
    }
}