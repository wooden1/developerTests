<?php
// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// autoload vendor and framework
require_once './vendor/framework/src/App/autoload.php';

session_start();

date_default_timezone_set('America/New_York');

// CREATE ROUTE PARSER & INIT
$parser = new \Route\RouteParser();
$parser->capture($_SERVER['REQUEST_METHOD']);

$uri = $parser->returnUri();

try {

    // ! DEBUGGING ONLY ===============================
    // if the dxr var is set, display all routes and kill the script
    if (isset($_GET['dxr'])) {
        $route->dump();
        die();
    }
    // ! DEBUGGING ONLY ===============================

    $route::submit($uri, $parser->returnParse());
} catch (Exception\RouteNotFound $e) {
    die($e->getMessage());
} catch (\Exception\MethodNotFound $e) {
    die($e->getMessage());
} catch (\Exception\ControllerNotFound $e) {
    die($e->getMessage());
} catch (\Exception $e) {
    die($e->getMessage());
}
