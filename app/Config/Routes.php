<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/books_users', 'User::books_users');
$routes->get('/chart_users', 'User::chart_users');
$routes->get('/login', 'Auth::login');
$routes->get('/login2', 'Auth::login2');
$routes->get('/register', 'Auth::register');
$routes->get('/welcome', 'Welcome::welcome');
$routes->get('/admin_books', 'Admin::admin_books');
$routes->get('/add_books', 'Admin::add_books');
$routes->get('/edit_books', 'Admin::edit_books');
