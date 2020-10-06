<?php


namespace DeckBuilder\Service\Builder;


use DeckBuilder\Entity\User\NickName;

class NicknameBuilderService implements BuilderInterface
{
    /**
     * @return NickName
     */
    public function build(): NickName
    {
        $nickname = new NickName();
        $nicknameValue = (string)filter_input(INPUT_POST, "nickname");

        if (!property_exists($nicknameValue, "nickname")) {
            $nicknameValue = "";
        }
        $nickname->setNickname($nicknameValue);
        return $nickname;
    }
}