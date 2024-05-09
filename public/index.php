<?php

use App\Service\Router;

require_once __DIR__ . '/../app/service/Router.php';

Router::add(method: 'get', route: '/', callback: function () {
    echo 'Home Page';
});

Router::add(method: 'get', route: '/login', callback: function () {
    echo 'Login Page';
});

Router::add(method: 'get', route: '/signup', callback: function () {
    echo 'Signup Page';
});

Router::add(method: 'post', route: '/login', callback: function () {
    echo 'Signup Page';
});

Router::route();