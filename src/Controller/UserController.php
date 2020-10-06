<?php


namespace DeckBuilder\Controller;


use DeckBuilder\Form\UserForm;
use DeckBuilder\Service\Domain\User\UserService;

class UserController extends Controller implements FormControllerInterface
{
    /**
     *
     */
    public function showForm(): void
    {
        $characteristicsList = (new UserForm())->hydrate();
        $this->render("user/user.html.php", [
            "nickname" => $nickname = $characteristicsList["nickname"],
            "email" => $email = $characteristicsList["email"],
            "password" => $password = $characteristicsList["password"],
            "userErrors" => $userErrors = $characteristicsList["userErrors"],
        ]);
    }
}