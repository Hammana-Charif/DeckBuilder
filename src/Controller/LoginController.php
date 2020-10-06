<?php


namespace DeckBuilder\Controller;


use DeckBuilder\Form\LoginForm;

class LoginController extends Controller implements FormControllerInterface
{
    /**
     *
     */
    public function showForm(): void
    {
        $characteristicsList = (new LoginForm())->hydrate();
        $this->render("user/login/login.html.php", [
            "email" => $email = $characteristicsList["email"],
            "password" => $password = $characteristicsList["password"],
            "loginErrors" => $loginErrors = $characteristicsList["loginErrors"],
        ]);
    }
}