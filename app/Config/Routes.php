<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('users/newUsers','Users::form');
$routes->post('users/connexion','Users::connexion');
$routes->get('/signuOut','Users::signuOut');




$routes->get('/', 'Users::index');

$routes->get('/', 'Taches::index');
$routes->get('deleteTache','Taches::deleteTache/{id}');
$routes->get('update', 'Taches::update/{id}');
$routes->get('newtache','Taches::newtache');
$routes->get('insnewtache','Taches::insnewtache');
$routes->get('modifierTache','Taches::modifierTache');
$routes->get('/signuOut','Users::signuOut');
$routes->get('vue_users','Users::listeClient');



$routes->get('/', 'Client::index');
$routes->get('newClient','Client::newClient');
$routes->get('validateClient','Client::validateClient');
$routes->get('deleteClient', 'Client::deleteClient/{id}'); 
$routes->get('update', 'Client::update/{id}'); 
$routes->get('detailClient', 'Client::infoclient/{id}'); 
$routes->get('updateClient', 'Client::updateClient'); 


$routes->get('/', 'Events::index');
$routes->get('Events/fullCalendar','Events::calendrier');
$routes->get('Events/activite','Events::activite');
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
