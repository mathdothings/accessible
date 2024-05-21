<?php

use App\Router\Router;

const ROOT = __DIR__ . '/../';
const STYLE_ROOT = __DIR__ . '/style/';

require_once ROOT . '/app/helper/functions.php';
require_once ROOT . '/app/router/Router.php';
require_once ROOT . '/app/router/routes.php';

Router::route();

session_start();
