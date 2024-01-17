<?php

use CodeIgniter\Router\RouteCollection;

if(file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('laporanarsip', 'Laporanarsip::index');
$routes->get('arsip/export','Arsip::export');