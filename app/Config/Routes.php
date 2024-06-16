<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

use App\Controllers\Home;
use App\Controllers\AuthController;

$routes->get('/', [AuthController::class, 'redirect']);

$routes->group('auth', ['filter' => 'guest'], static function ($routes) {
  $routes->get('login',     [AuthController::class, 'login']);
  $routes->post('login',    [AuthController::class, 'login_process']);
  $routes->get('register',  [AuthController::class, 'register']);
  $routes->post('register', [AuthController::class, 'register_process']);
});
$routes->get('auth/logout', [AuthController::class, 'logout']);

$routes->group('admin', ['filter' => 'role:admin'], static function ($routes) {
  $routes->get('', fn () => 'Admin Page');
});

$routes->group('user', ['filter' => 'role:user'], static function ($routes) {
  $routes->get('', fn () => 'User Page');
});

$routes->group('profile', ['filter' => 'role:admin,user'], static function ($routes) {
  $routes->get('', fn () => 'Profile Page');
});
