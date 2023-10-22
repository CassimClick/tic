<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('registration', 'RegistrationController::index');
$routes->post('registration', 'RegistrationController::registration');

service('auth')->routes($routes);
