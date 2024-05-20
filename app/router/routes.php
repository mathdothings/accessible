<?php

namespace App\Router;

use App\Service\Authentication;

require_once ROOT . 'app/service/Authentication.php';

Router::add(method: 'get', route: '/', callback: function () {
    Authentication::authenticate() ?
        require_once ROOT . 'app/controller/home/home.controller.php' : Router::redirect('/login');
});

Router::add(method: 'get', route: '/login', callback: function () {
    Authentication::authenticate() ?
        Router::redirect('/') : require_once ROOT . 'app/controller/login/login.controller.php';
});

Router::add(method: 'post', route: '/login', callback: function () {
    echo 'Login - POST - Page';
});

Router::add(method: 'get', route: '/signup', callback: function () {
    Authentication::authenticate() ?
        Router::redirect('/') : require_once ROOT . 'app/controller/signup/signup.controller.php';
});

Router::add(method: 'post', route: '/signup', callback: function () {
    echo 'Signup - POST - Page';
});
