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
$routes->setDefaultController('Maincontroller');
$routes->setDefaultMethod('login');
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
$routes->get('/', 'Maincontroller::login');
$routes->get('hub', 'Maincontroller::hub');
$routes->get('groups', 'Maincontroller::groups');
$routes->get('group', 'Maincontroller::group');
$routes->get('addObservation', 'Maincontroller::addObservation');
$routes->get('leaderboardSelect', 'Maincontroller::leaderboardSelect');
$routes->get('profile', 'Maincontroller::profile');
//$routes->get('leaderboard', 'Maincontroller::leaderboard');
$routes->get('leaderboard/(:alpha)/(:num)/(:alpha)', 'Maincontroller::leaderboard/$filter/$userID/$period');
$routes->get('login', 'Maincontroller::login');
$routes->get('loginFromObservation', 'Maincontroller::loginFromObservation');
$routes->get('register', 'Maincontroller::register');
$routes->get('forgotPassword', 'Maincontroller::forgotPassword');
$routes->get('resetPassword', 'Maincontroller::resetPassword');
$routes->get('anobservation', 'Maincontroller::anobservation');
$routes->get('account', 'Maincontroller::account');
$routes->get('edit_profile', 'Maincontroller::edit_profile');
$routes->get('search', 'Maincontroller::search');

//$routes->get('login', 'Maincontroller::login');
$routes->match(['get','post'],'login', 'Maincontroller::login');
$routes->get('loginFromObservation', 'Maincontroller::loginFromObservation');
//$routes->get('register', 'Maincontroller::register');
$routes->match(['get','post'],'register', 'Maincontroller::register');

$routes->get('forgotPassword', 'Maincontroller::forgotPassword');
$routes->get('resetPassword', 'Maincontroller::resetPassword');
$routes->get('anobservation', 'Maincontroller::anobservation');
$routes->get('databaseTest', 'Maincontroller::databaseTest');




/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
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
