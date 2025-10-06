<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ArticleController::index');
$routes->get('/(:num)', 'ArticleController::article/$1');
$routes->get('/seasons', 'SeasonController::index');
$routes->get('/seasons/(:num)', 'SeasonController::matches/$1');
$routes->get('/match/(:num)', 'SeasonController::match/$1');
$routes->get('/login', 'LoginController::show');
$routes->post('/login', 'LoginController::login');
$routes->get('/logout', 'LoginController::logout');

$routes->group('admin', ['filter' => 'admin'], function($routes) {
    $routes->get('articles', 'ArticleController::adminIndex');
    $routes->get('articles/create', 'ArticleController::create');
    $routes->post('articles/store', 'ArticleController::store');
    $routes->get('articles/edit/(:num)', 'ArticleController::edit/$1');
    $routes->post('articles/update/(:num)', 'ArticleController::update/$1');
    $routes->get('articles/delete/(:num)', 'ArticleController::delete/$1');
});


