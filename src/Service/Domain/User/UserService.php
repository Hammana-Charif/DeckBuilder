<?php


namespace DeckBuilder\Service\Domain\User;


use DeckBuilder\Entity\User\Email;
use DeckBuilder\Entity\User\NickName;
use DeckBuilder\Entity\User\Password;
use DeckBuilder\Service\ManagerService;

class UserService
{
    /**
     * @param string $nickName
     * @param string $email
     * @param string $password
     */
    public function saveUser(string $nickName, string $email, string $password): void
    {
        $dbh = ManagerService::getConnection();

        $dbh->prepare("INSERT INTO `user`(`nickname`, `email`, `password`) VALUES (:nickname, :email, :password)")
            ->execute([
                ":nickname" => $nickName,
                ":email" => $email,
                ":password" => $password,
            ]);
    }

    public function saveCharacteristics(NickName $nickname, Email $email, Password $password)
    {
        $nicknameService = new NicknameService();
        $nicknameLastId = $nicknameService->saveNickname($nickname);

        $emailService = new EmailService();
        $emailLastId = $emailService->saveEmail($email);

        $passwordService = new PasswordService();
        $passwordLastId = $passwordService->savePassword($password);

        $this->saveUser($nicknameLastId, $emailLastId, $passwordLastId);
    }
}