<?php

namespace App\Controller\Signup;

use App\Router\Router;
use App\Service\Authentication\Authentication;
use App\DIContainer\UserSignupDIContainer;
use App\DTO\UserSignupDTO;
use App\View\View;

class SignupController
{
    public function __construct(public UserSignupDIContainer $userSignupDIContainer)
    {
    }

    static private function createUserSignupDTO(): UserSignupDTO
    {
        return new UserSignupDTO([
            'name' => trim($_POST['signup-name']) ?? '',
            'email' => trim($_POST['signup-email']) ?? '',
            'password' => $_POST['signup-password'] ?? '',
            'repeatPassword' => $_POST['signup-repeat-password'] ?? ''
        ]);
    }

    public function post(): void
    {
        if (Authentication::authenticate()) Router::redirect('/');

        $this->userSignupDIContainer::setDefinitions(
            ['validation' => fn () => new \App\Service\Validation\UserSignupValidation]
        );

        $validation = $this->userSignupDIContainer::get('validation');
        if (!$validation::validate(self::createUserSignupDTO())) dd('Stop');
        // if valid, call the repository service, persist data
        // call the notification service, for both success or failure
    }

    static public function get()
    {
        return View::signup();
    }
}
