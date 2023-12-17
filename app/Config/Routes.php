<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/kelas', 'Siswa::kelas');
$routes->get('/jadwal', 'Siswa::jadwal');
$routes->get('/kelas_mat', 'Siswa::kelas_mat');

$routes->get('/guru_kelas', 'Guru::guru_kelas');
$routes->get('/guru_beranda', 'Guru::guru_beranda');
$routes->get('/guru_jadwal', 'Guru::guru_jadwal');
$routes->get('/add_class', 'Guru::add_class');
$routes->get('/kelas_mat_guru', 'Guru::kelas_mat_guru');
$routes->get('/add_section', 'Guru::add_section');
$routes->get('/jadwal_guru', 'Guru::jadwal_guru');

$routes->get('/add_jadwal', 'Siswa::add_jadwal');
$routes->get('/edit_jadwal', 'Siswa::edit_jadwal');

$routes->get('/login', 'Auth::login');
$routes->get('/login_guru', 'Auth::login_guru');
$routes->get('/register', 'Auth::register');
$routes->get('/register_guru', 'Auth::register_guru');
