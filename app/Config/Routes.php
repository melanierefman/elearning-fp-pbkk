<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/kelas', 'Siswa::kelas');
$routes->get('/jadwal', 'Siswa::jadwal');
$routes->get('/add_jadwal', 'Siswa::add_jadwal');
$routes->get('/login', 'Auth::login');
$routes->get('/login2', 'Auth::login2');
$routes->get('/register', 'Auth::register');
