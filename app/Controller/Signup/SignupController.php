<?php

namespace App\Controller\Signup;

use App\Router\Router;
use App\Service\Authentication\Authentication;
use App\DIContainer\UserSignupDIContainer;
use App\DTO\UserSignupDTO;
use App\Service\Database\Database;
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
            definitions: [
                'validation' => fn () => new \App\Service\Validation\UserSignupValidation,
                'repository' => fn () => new \App\Service\Repository\UserRepository(new Database(Database::connection()))
            ]
        );

        $dto = self::createUserSignupDTO();
        $container = $this->userSignupDIContainer;

        $validation = $container::get('validation');
        $errors = $validation::isValid($dto);
        if (is_array($errors)) self::get(errors: $errors);

        $repository = $container::get('repository');
        $repository->save($dto);
        echo 'Saved!';
        // call the notification service, for both success or failure
    }

    static public function get(array $errors = null)
    {
        return View::signup($errors);
        die;
    }
}
