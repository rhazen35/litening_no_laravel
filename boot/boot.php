<?php

use App\Core\Router;

/**
 * --------------------------------
 * Require the configuration files.
 * --------------------------------
 */

require __DIR__ . '/../config/app.config.php';

/**
 * ----------------------------------------------------------------------------
 * Require the autoload file from the boot directory to launch the application.
 * ----------------------------------------------------------------------------
 */
require __DIR__ . '/../boot/autoload.php';

/**
 * -------------------------
 * Require the routes files.
 * -------------------------
 */
require __DIR__ . '/../routes/routes.php';

/**
 * ------------------
 * Resolve the route.
 * ------------------
 */
$router = new Router();
$router->resolve($_SERVER['REQUEST_URI']);