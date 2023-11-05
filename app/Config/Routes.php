<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('registration', 'RegistrationController::index');
$routes->post('registration', 'RegistrationController::registration');

// service('auth')->routes($routes);
//Authentication Routes
$routes->get('register', 'AuthController::register');
$routes->post('createAccount', 'AuthController::createAccount');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginAction');
$routes->get('logout', 'AuthController::logoutAction');

$routes->group('admin', ['filter' => 'AdminAuthFilter'], function ($routes) {
    $adminRoutes = [];
    $adminRoutes['dashboard'] = 'AdminController::index';
    $adminRoutes['users'] = 'UserController::users';
    $adminRoutes['createUser'] = 'UserController::createUser';
    $adminRoutes['editUser'] = 'UserController::editUser';
    $adminRoutes['deleteUser'] = 'UserController::deleteUser';
    $adminRoutes['sendMail'] = 'AdminController::sendMail';
    $adminRoutes['updateUser'] = 'UserController::updateUser';
    
    
    $adminRoutes['toggleApproval'] = 'AdminController::toggleApproval';
    $adminRoutes['batchToggleApproval'] = 'AdminController::batchToggleApproval';
    $adminRoutes['registrations'] = 'AdminController::registrations';
    $adminRoutes['reports'] = 'AdminController::reports';
    $adminRoutes['generateReports'] = 'AdminController::generateReports';
    $adminRoutes['downloadReport/(:any)/(:any)/(:any)'] = 'AdminController::downloadReport/$1/$2/$3';
  

    $routes->map($adminRoutes);
});

$routes->set404Override(function () {

    $data['title'] = '404';

    echo view('Pages/404', $data);
});
