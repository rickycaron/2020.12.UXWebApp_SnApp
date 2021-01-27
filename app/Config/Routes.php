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
//['filter' => 'noauth'], this website can only be shown when the user hasn'r logged in
//['filter' => 'auth'], this website can only be shown when the user has logged in

$routes->get('/', 'Maincontroller::login',['filter' => 'noauth']);
//$routes->get('/lang/{locale}', 'Language::index',['filter' => 'noauth']);
$routes->get('/hub', 'Maincontroller::hub',['filter'=>'auth']);
$routes->get('groups', 'Maincontroller::groups',['filter'=>'auth']);
$routes->match(['get','post'],'group/(:alpha)', 'Maincontroller::group/$1',['filter'=>'auth']);
$routes->match(['get','post'],'newgroup', 'Maincontroller::newgroup',['filter'=>'auth']);
$routes->get('groupmembers/(:alpha)', 'Maincontroller::groupmembers/$1',['filter'=>'auth']);
$routes->get('addGroupMembers/(:num)/(:alpha)', 'Maincontroller::addGroupMembers/$1/$2',['filter'=>'auth']);
$routes->get('addFriendToGroup/(:any)/(:alpha)', 'Maincontroller::addFriendToGroup/$1/$2',['filter'=>'auth']);

$routes->get('changeLikeStatus/(:num)','Maincontroller::changeLikeStatus/$1',['filter'=>'auth']);

$routes->get('cancelLikeStatus/(:num)','Maincontroller::cancelLikeStatus/$1',['filter'=>'auth']);

$routes->get('sendComment/(:any)/(:num)','Maincontroller::sendComment/$1/$2',['filter'=>'auth']);

$routes->get('getUsername','Maincontroller::getUsername',['filter'=>'auth']);

$routes->get('deleteUserFromGroup/(:num)/(:num)/(:alpha)', 'Maincontroller::deleteUserFromGroup/$1/$2/$3',['filter'=>'auth']);

$routes->get('addObservation', 'Maincontroller::addObservation');
$routes->match(['get','post'],'addObservation', 'Maincontroller::addObservation');
$routes->get('addObservationWithoutLogin', 'Maincontroller::addObservationWithoutLogin');
$routes->match(['get','post'],'addObservationWithoutLogin', 'Maincontroller::addObservationWithoutLogin');
$routes->get('leaderboardSelect', 'LeaderboardController::leaderboardSelect',['filter'=>'auth']);
$routes->get('profile', 'Maincontroller::profile',['filter'=>'auth']);
$routes->get('otheruserprofile/(:num)', 'Maincontroller::otheruserprofile/$1',['filter'=>'auth']);
$routes->get('sendFriendRequest/(:num)', 'Maincontroller::sendFriendRequest/$1');

$routes->get('leaderboard/(:alpha)', 'LeaderboardController::leaderboard/$1',['filter'=>'auth']);
$routes->get('fetchFriendsLeaderboard/(:alpha)', 'LeaderboardController::fetchFriendsLeaderboard/$1',['filter'=>'auth']);
$routes->get('fetchWorldwideLeaderboard/(:alpha)', 'LeaderboardController::fetchWorldwideLeaderboard/$1',['filter'=>'auth']);
$routes->get('fetchGroupLeaderboard/(:alpha)/(:alpha)', 'LeaderboardController::fetchGroupLeaderboard/$1/$2',['filter'=>'auth']);
$routes->match(['get','post'],'forgotPassword', 'Maincontroller::forgotPassword',['filter' => 'noauth']);
$routes->match(['get','post'],'resetPassword/(:num)', 'Maincontroller::resetPassword/$1',['filter'=>'auth']);

$routes->get('anobservation/(:num)', 'Maincontroller::anobservation/$1',['filter'=>'auth']);
$routes->get('fetchObservationLikeHTML/(:num)', 'Maincontroller::fetchObservationLikeHTML/$1');
$routes->get('fetchObservationCommentHTML/(:num)', 'Maincontroller::fetchObservationCommentHTML/$1');
$routes->match(['get','post'],'account/(:num)', 'Maincontroller::account/$1',['filter'=>'auth']);
$routes->get('edit_profile', 'Maincontroller::edit_profile',['filter'=>'auth']);
$routes->get('search', 'SearchController::search');
$routes->get('searchGetObservations/(:alpha)', 'SearchController::searchGetObservations/$1');
$routes->get('searchGetGroups/(:alpha)', 'SearchController::searchGetGroups/$1');
$routes->get('searchGetUsers/(:alpha)', 'SearchController::searchGetUsers/$1');
$routes->get('search', 'SearchController::search');
$routes->get('search', 'SearchController::search');
$routes->get('friendList', 'Maincontroller::friendList');
$routes->get('acceptFriendRequest/(:num)', 'Maincontroller::acceptFriendRequest/$1');
$routes->get('declineFriendRequestOrDelete/(:num)', 'Maincontroller::declineFriendRequestOrDelete/$1');

$routes->match(['get','post'],'hub', 'Maincontroller::hub',['filter' => 'auth']);
$routes->match(['get','post'],'login', 'Maincontroller::login',['filter' => 'noauth']);
$routes->get('loginFromObservation', 'Maincontroller::loginFromObservation');
$routes->match(['get','post'],'register', 'Maincontroller::register',['filter' => 'noauth']);
$routes->get('logout','Maincontroller::logout');


$routes->match(['get','post'],'edit_profile', 'Maincontroller::edit_profile',['filter' => 'auth']);

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
