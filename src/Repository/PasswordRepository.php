<?php


namespace DeckBuilder\Repository;


use DeckBuilder\Service\ManagerService;
use PDO;

class PasswordRepository
{
    /**
     * @return mixed|null
     */
    public function match()
    {
        $passwordInput = filter_input(INPUT_POST, "password");
        $dbh = ManagerService::getConnection();
        $passwordResult = null;
        $sthPassword = $dbh->query("SELECT password FROM password");
        while ($passwords = $sthPassword->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($passwordInput, $passwords['password']) === true) {
                $passwordResult = $passwords;
                var_dump($passwords);
                break;
            }
        }
        return $passwordResult;
    }
}