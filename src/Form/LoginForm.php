<?php


namespace DeckBuilder\Form;


use DeckBuilder\Repository\EmailRepository;
use DeckBuilder\Repository\NicknameRepository;
use DeckBuilder\Repository\PasswordRepository;
use DeckBuilder\Service\Builder\EmailBuilderService;
use DeckBuilder\Service\Builder\PasswordBuilderService;
use DeckBuilder\Service\Validator\EmailValidator;
use DeckBuilder\Service\Validator\PasswordValidator;
use PDO;

class LoginForm implements FormInterface
{
    private bool $isValid = true;

    /**
     *
     */
    public function hydrate(): array
    {
        $emailBuilderService = new EmailBuilderService();
        $email = $emailBuilderService->build();
        $passwordBuilderService = new PasswordBuilderService();
        $password = $passwordBuilderService->build();
        $loginErrors = [];

        if (true === $this->isSubmitted()) {
            $emailRepository = new EmailRepository();
            $emailResult = $emailRepository->findByMail();
            $email->setEmail((string)filter_input(INPUT_POST, "email"));

            $nicknameRepository = new NicknameRepository();
            $usernameResult = $nicknameRepository->joinEmailToUsername(@$emailResult['id']);

            $passwordRepository = new PasswordRepository();
            $passwordResult = $passwordRepository->match();
            $password->setPassword((string)filter_input(INPUT_POST, "password"));

            $emailValidator = new EmailValidator();
            $loginErrors["email"] = $this->check($emailValidator, "email");
            $passwordValidator = new PasswordValidator();
            $loginErrors["password"] = $this->check($passwordValidator, "password");

            $loginErrors['connexion'] = $this->connexion($email, $emailResult, $password, $passwordResult, $usernameResult);
        }
        return $characteristicsList = ["email" => $email, "password" => $password, "loginErrors" => $loginErrors];
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * @return bool
     */
    public function isSubmitted(): bool
    {
        if (null !== filter_input(INPUT_POST, "login_create"))
            return true;
        else
            return false;
    }

    /**
     * @param $validator
     * @param string $characteristic
     * @return string
     */
    public function check($validator, string $characteristic): string
    {
        $errorString = "";
        if (false === $validator->validate()) {
            $this->isValid = false;
            if ("email" === $characteristic)
                $errorString = "Veuillez saisir une adresse mail valide";
            if ("password" === $characteristic)
                $errorString = "Veuillez saisir un mot de passe valide";
        }
        return $errorString;
    }

    /**
     * @param $email
     * @param $emailResult
     * @param $password
     * @param $passwordResult
     * @param $usernameResult
     * @return string
     */
    public function connexion($email, $emailResult, $password, $passwordResult, $usernameResult)
    {
        if (true === $this->isValid()) {
            if ($email->getEmail() === @$emailResult['email'] && password_verify($password->getPassword(), @$passwordResult['password'])) {
                session_start();
                $_SESSION["message"] = "Vous êtes connecté";
                $_SESSION["username"] = $usernameResult;
                if (isset($_SESSION["username"])) {
                    header('Location:http://localhost:8000/cards');
                }
            } else {
                $this->isValid = false;
                return "Connexion échouée, veuillez réessayer";
            }
        }
    }
}