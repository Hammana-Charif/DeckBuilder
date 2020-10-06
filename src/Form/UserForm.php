<?php


namespace DeckBuilder\Form;


use DeckBuilder\Repository\EmailRepository;
use DeckBuilder\Repository\NicknameRepository;
use DeckBuilder\Service\Builder\EmailBuilderService;
use DeckBuilder\Service\Builder\NicknameBuilderService;
use DeckBuilder\Service\Builder\PasswordBuilderService;
use DeckBuilder\Service\Domain\User\UserService;
use DeckBuilder\Service\Validator\EmailValidator;
use DeckBuilder\Service\Validator\NicknameValidator;
use DeckBuilder\Service\Validator\PasswordValidator;


class UserForm implements FormInterface
{
    private bool $isValid = true;

    /**
     * @return array
     */
    public function hydrate(): array
    {
        $nicknameBuilderService = new NicknameBuilderService();
        $nickname = $nicknameBuilderService->build();
        $emailBuilderService = new EmailBuilderService();
        $email = $emailBuilderService->build();
        $passwordBuilderService = new PasswordBuilderService();
        $password = $passwordBuilderService->build();
        $userErrors = [];

        if (true === $this->isSubmitted()) {

            $nicknameValidator = new NicknameValidator();
            $nicknameRepository = new NicknameRepository();
            $userErrors["nickname"] = $this->check($nicknameValidator, $nicknameRepository, "nickname");
            $nickname->setNickName((string)filter_var(filter_input(INPUT_POST, "nickname")));

            $emailValidator = new EmailValidator();
            $emailRepository = new EmailRepository();
            $userErrors["email"] = $this->check($emailValidator, $emailRepository, "email");
            $email->setEmail((string)filter_var(filter_input(INPUT_POST, "email")));

            $userErrors["password"] = $this->checkPassword();
            $password->setPassword((string)filter_var(filter_input(INPUT_POST, "password")));

            $userErrors["confirm"] = $this->confirmPassword();
            $this->save($nickname, $email, $password);
        }
        return $characteristicsList = ["nickname" => $nickname, "email" => $email, "password" => $password, "userErrors" => $userErrors];
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
        if (null !== filter_input(INPUT_POST, "user_create"))
            return true;
        else
            return false;
    }

    /**
     * @param $validator
     * @param $repository
     * @param string $characteristic
     * @return string
     */
    public function check($validator, $repository, string $characteristic): string
    {
        $errorString = "";
        if (false === $validator->validate()) {
            $this->isValid = false;
            if ("nickname" === $characteristic)
                $errorString = "Veuillez saisir un pseudonyme valide";
            if ("email" === $characteristic)
                $errorString = "Veuillez saisir une adresse mail valide";
        }
        if (in_array(filter_input(INPUT_POST, "$characteristic"), $repository->select()) === true) {
            $this->isValid = false;
            $errorString = 'La saisie existe déjà';
        }
        return $errorString;
    }

    /**
     * @return string
     */
    public function checkPassword(): string
    {
        $passwordValidator = new PasswordValidator();
        $errorString = "";
        if (false === $passwordValidator->validate()) {
            $this->isValid = false;
            $errorString = "Veuillez saisir un mot de passe valide";
        }
        return $errorString;
    }

    /**
     * @return string
     */
    public function confirmPassword(): string
    {
        $passwordValidator = new PasswordValidator();
        $errorString = "";
        if (false === $passwordValidator->confirm()) {
            $this->isValid = false;
            $errorString = "Veuillez confirmer le mot de passe";
        }
        return $errorString;
    }

    /**
     * @param $nickname
     * @param $email
     * @param $password
     */
    public function save($nickname, $email, $password)
    {
        if (true === $this->isValid()) {
            $userService = new UserService();
            $userService->saveCharacteristics($nickname, $email, $password);
            header('Location:http://localhost:8000/user?login');
        }
    }
}