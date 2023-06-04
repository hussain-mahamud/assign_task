<?php
use Pecee\SimpleRouter\SimpleRouter;

require_once __DIR__ .'/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('ROOT',__DIR__);
define('VIEWS',__DIR__.'/views');

/* Load external routes file */
require_once 'routes/route.php';

/**
 * The default namespace for route-callbacks, so we don't have to specify it each time.
 * Can be overwritten by using the namespace config option on your routes.
 */

SimpleRouter::setDefaultNamespace('\App\Controllers');

// Start the routing
SimpleRouter::start();