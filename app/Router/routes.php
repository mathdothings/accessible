<?php

namespace App\Router;

use App\Controller\Signup\SignupController;
use App\DIContainer\UserSignupDIContainer;
use App\Service\Authentication\Authentication;
use App\View\View;

Router::add(method: 'get', route: '/', callback: function () {
    Authentication::authenticate() ? View::home() : Router::redirect('/login');
});

Router::add(method: 'get', route: '/login', callback: function () {
    Authentication::authenticate() ? Router::redirect('/') : View::login();
});

Router::add(method: 'post', route: '/login', callback: function () {
    echo 'Login - POST - Page';
});

Router::add(method: 'get', route: '/signup', callback: function () {
    Authentication::authenticate() ? Router::redirect('/') : SignupController::get();
});

Router::add(method: 'post', route: '/signup', callback: function () {
    $signupController = new SignupController(new UserSignupDIContainer);
    $signupController->post();
});
