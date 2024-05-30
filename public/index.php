<?php

use App\Router\Router;

const ROOT = __DIR__ . '/../';
const STYLE_ROOT = __DIR__ . '/style/';

// helper
require_once ROOT . '/app/helper/functions.php';

// router
require_once ROOT . '/app/router/Router.php';
require_once ROOT . '/app/router/routes.php';

// view
require_once ROOT . 'app/view/View.php';

// service
require_once ROOT . 'app/service/Authentication.php';

// controller
require_once ROOT . 'app/controller/login/LoginController.php';

Router::route();

session_start();
