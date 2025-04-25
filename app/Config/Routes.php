<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('auth/doLogin', 'Auth::doLogin');
$routes->post('auth/doRegister', 'Auth::doRegister');
$routes->get('/materi', 'Pages::materi');
