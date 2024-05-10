<?php

namespace App\Service;

Router::add(method: 'get', route: '/', callback: function () {
    echo 'Home - GET - Page';
});

Router::add(method: 'get', route: '/login', callback: function () {
    echo 'Login - GET - Page';
});

Router::add(method: 'post', route: '/login', callback: function () {
    echo 'Login - POST - Page';
});

Router::add(method: 'get', route: '/signup', callback: function () {
    echo 'Signup - GET - Page';
});
