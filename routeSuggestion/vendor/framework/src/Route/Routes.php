<?php

// Resource Routes
$route = \Route\Route::getInstance();

$route::resource('fruit', 'FruitController');

/**
 * vars in query string can be differentiated by adding a type
 * {id} is assumed to be an int type, any other prop name needs to 
 * defined by a type, either string/int, I haven't a need for floats, 
 * most larger datasets are being send by post anyway, or in rare cases
 * JSON strings 
 */
$route::controller('fruit/{name:string}', 'FruitController', 'getFruitByName');