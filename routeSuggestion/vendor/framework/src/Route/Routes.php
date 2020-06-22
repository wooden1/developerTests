<?php

/**
 * Given the relatively static nature of this page, we can ignore the 80 char
 * line requirements for route definitions, as the Route::controller()
 * definitions will easily go over. If Prettier, or whichever linter, we end up
 * using auto-formats it, so be it, we may ignore this file in the future.
 */

// Resource Routes
$route = \Route\RouteController::getInstance();

$route::resource('fruits', 'FruitsController');

/**
 * vars in query string can be differentiated by adding a type
 * {id} is assumed to be an int type, any other prop name needs to
 * defined by a type, either string/int, I haven't a need for floats,
 * most larger datasets are being send by post anyway, or in rare cases
 * JSON strings
 *
 * TODO: define default for uid in Route Parser - i.e., {uid:string}
 */
$route::controller('fruits/{name:string}', 'FruitsController', 'getFruitByName');
