<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// login 
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');

// admin 
$routes->get('admin', 'Materi::index');
$routes->get('admin/detail/(:segment)', 'Materi::detail/$1');
$routes->get('admin/edit/(:segment)', 'Materi::edit/$1');
$routes->post('/admin/update/(:num)', 'Materi::update/$1');
$routes->get('admin/create', 'Materi::create');
$routes->post('admin/save', 'Materi::save');
$routes->delete('admin/delete/(:num)', 'Materi::delete/$1');


//  website
$routes->get('/', 'Home::index');
$routes->get('materi', 'Home::materi');
// $routes->get('materi-detail', 'Home::materi_detail');
$routes->get('/materi-detail/(:segment)', 'Home::materi_detail/$1');
