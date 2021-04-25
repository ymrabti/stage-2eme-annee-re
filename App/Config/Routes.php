<?php
namespace Config;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


$routes->match(['get', 'post'], 'news/create', 'News::create');
$routes->get('news/(:segment)', 'News::view/$1');
$routes->get('news', 'News::index');
$routes->get('(page/:any)', 'Pages::route/$1');
$routes->get("/","Home::index");

$routes->get("ecoles/", "Home::ecoles");
$routes->get("ecoles/(:any)", "Home::infos_ecole/$1");

$routes->get("formations/", "Home::formations");
$routes->get("formations/(:any)", "Home::infos_formation/$1");

$routes->get("welcome/(:any)","Home::welcome/$1");
$routes->get("api","Home::api");


if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
