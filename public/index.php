<?php

use App\Service\Router;

const ROOT = __DIR__ . '/../';

require_once ROOT . '/app/helper/functions.php';
require_once ROOT . '/app/router/Router.php';
require_once ROOT . '/app/router/routes.php';

Router::route();