<?php

namespace App\Router;

use App\Service\Authentication;
use App\View\View;

require_once ROOT . 'app/service/Authentication.php';
require_once ROOT . 'app/view/View.php';

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
    Authentication::authenticate() ? Router::redirect('/') : View::signup();
});

Router::add(method: 'post', route: '/signup', callback: function () {
    echo 'Signup - POST - Page';
});
