<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');

//auth routes
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/login_submit', 'Auth::login_submit');
$routes->get('/auth/logout', 'Auth::logout');

//product routes
$routes->get('/products', 'Products::index');
$routes->get('/products/new', 'Products::new_product');
$routes->post('/products/new_submit', 'Products::new_submit');

//edit product
$routes->get('/products/edit/(:alphanum)', 'Products::edit/$1');
$routes->post('/products/edit_submit', 'Products::edit_submit');

//remove product
$routes->get('/products/remove/(:alphanum)', 'Products::remove/$1');
$routes->get('/products/remove_confirm(:alphanum)', 'Products::remove_confirm/$1');

//stock product
$routes->get('/products/stock/(:alphanum)', 'Products::stock/$1');
$routes->post('/products/stock_submit', 'Products::stock_submit');



