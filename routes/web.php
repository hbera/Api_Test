<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get("/urls/{id}", [
	'as' => 'url.index',
	'uses'=> "UrlController@index"
]);

$router->post("/users/{user}/urls", [
	'as' => 'user.urls', 
	'uses' => "UserController@urls"
]);

$router->get("/stats/", [
	'as' => 'stats.index', 
	'uses' => "StatsController@index"
]);

$router->get("/users/{userId}/stats", [
	'as' => 'user.stats', 
	'uses' => "UserController@stats"
]);

$router->get("/stats/{id}", [
	'as' => 'stats.url', 
	'uses' => "StatsController@show"
]);

$router->delete("/urls/{id}", [
	'as' => 'url.delete', 
	'uses' => "UrlController@delete"
]);

$router->post("/users", [
	'as' => 'user.create', 
	'uses' => "UserController@create"
]);

$router->delete("/users/{id}", [
	'as' => 'user.delete', 
	'uses' => "UserController@delete"
]);