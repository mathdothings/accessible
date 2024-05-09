<?php

namespace App\Service;

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
