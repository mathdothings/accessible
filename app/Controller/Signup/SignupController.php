<?php

namespace App\Controller\Signup;

use App\DIContainer\UserSignupDIContainer;
use App\DTO\UserSignupDTO;
use App\Service\Validation\UserSignupValidation;
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
        $this->userSignupDIContainer->set(
            'App\Service\Validation\UserSignupValidation',
            new UserSignupValidation
        );
        $validation = $this->userSignupDIContainer->get('App\Service\Validation\UserSignupValidation');
        $validation::validate(self::createUserSignupDTO());
        // if valid, call the repository service, persist data
        // call the notification service, for both success or failure
        dd($validation);
    }

    static public function get()
    {
        return View::signup();
    }
}
