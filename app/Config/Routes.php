<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('trpadmin/trpadmin');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->options('(:any)', '', ['filter' => 'cors']);


$routes->group('',['filter'=>'isLoggedIn'],function($routes){
    
// small link routes
$routes->get('/','trpadmin/trpadmin::index');
$routes->get('dashboard','trpadmin/trpadmin::index');
$routes->get('newbilty','trpadmin/trpadmin::B98EG');
$routes->post('BE45KL','trpadmin/trpadmin::BE45KL');
$routes->post('BE45NE','trpadmin/trpadmin::BE45NE');
$routes->post('addBilty','trpadmin/trpadmin::addBilty');
$routes->get('consignor','trpadmin/trpadmin::B98EF');
$routes->get('norfetch','trpadmin/trpadmin::fetchnor');
$routes->get('neefetch','trpadmin/trpadmin::fetchnee', ['filter' => 'cors']);
$routes->get('applicants','trpadmin/trpadmin::applicants');
$routes->post('norview','trpadmin/trpadmin::norview');
$routes->post('noredit','trpadmin/trpadmin::noredit');
$routes->post('fetchcity','trpadmin/trpadmin::fetchcity');
$routes->post('norupdate','trpadmin/trpadmin::norupdate');
$routes->post('delete_nor','trpadmin/trpadmin::delete_nor');
$routes->get('/avtar','trpadmin/trpadmin::avtar');
$routes->get('delete_profile_pic','trpadmin/trpadmin::delete_profile_pic');
$routes->post('edit_profile','trpadmin/trpadmin::edit_profile');
$routes->post('change_password','trpadmin/trpadmin::change_password');
$routes->get('userprofile','trpadmin/trpadmin::userprofile');
$routes->get('loginactivity','trpadmin/trpadmin::loginactivity');
$routes->get('city','trpadmin/trpadmin::city');
$routes->get('insertCity','trpadmin/trpadmin::insertCity');



$routes->get('demo','reactproject/reactCon::demo');




$routes->get('quotation','trpadmin/quotation::index');
$routes->get('quotshowData','trpadmin/quotation::showData');
$routes->get('addQuotName','trpadmin/quotation::addQuotName');
$routes->get('saveQuotationDetails','trpadmin/quotation::saveQuotation');
$routes->get('loadTalDist','trpadmin/quotation::loadTalDist');
$routes->get('talDist','trpadmin/quotation::talDist');
$routes->get('assignQuot','trpadmin/quotation::assignQuot');
$routes->get('loadConQuot','trpadmin/quotation::loadConQuot');
$routes->get('conData','trpadmin/quotation::conData');
$routes->get('assignQuotation','trpadmin/quotation::assignQuotation');
$routes->get('neeData','trpadmin/quotation::neeData');
$routes->get('getQuotdata','trpadmin/quotation::getQuotdata');




$routes->get('/register','trpadmin/user::index');





// This is a controller routes
    $routes->get('/','trpadmin/trpadmin::index');
    $routes->get('trpadmin/trpadmin/index','trpadmin/trpadmin::index');
    $routes->get('trpadmin/trpadmin/B98EG','trpadmin/trpadmin::B98EG');
    $routes->post('trpadmin/trpadmin/BE45KL','trpadmin/trpadmin::BE45KL');
    $routes->post('trpadmin/trpadmin/BE45NE','trpadmin/trpadmin::BE45NE');
    $routes->get('trpadmin/trpadmin/B98EF','trpadmin/trpadmin::B98EF');
    $routes->get('trpadmin/trpadmin/fetchnor','trpadmin/trpadmin::fetchnor');
    $routes->get('trpadmin/trpadmin/fetchnee','trpadmin/trpadmin::fetchnee');
    $routes->get('trpadmin/trpadmin/applicants','trpadmin/trpadmin::applicants');
    $routes->post('trpadmin/trpadmin/norview','trpadmin/trpadmin::norview');
    $routes->post('trpadmin/trpadmin/noredit','trpadmin/trpadmin::noredit');
    $routes->post('trpadmin/trpadmin/fetchcity','trpadmin/trpadmin::fetchcity');
    $routes->post('trpadmin/trpadmin/norupdate','trpadmin/trpadmin::norupdate');
    $routes->post('trpadmin/trpadmin/delete_nor','trpadmin/trpadmin::delete_nor');
    $routes->get('trpadmin/trpadmin/avtar','trpadmin/trpadmin::avtar');
    $routes->get('trpadmin/trpadmin/delete_profile_pic','trpadmin/trpadmin::delete_profile_pic');
    $routes->post('trpadmin/trpadmin/edit_profile','trpadmin/trpadmin::edit_profile');
    $routes->post('trpadmin/trpadmin/change_password','trpadmin/trpadmin::change_password');
    $routes->get('trpadmin/trpadmin/userprofile','trpadmin/trpadmin::userprofile');
    $routes->get('trpadmin/trpadmin/loginactivity','trpadmin/trpadmin::loginactivity');
    $routes->get('trpadmin/trpadmin/addBilty','trpadmin/trpadmin::addBilty');
    $routes->get('trpadmin/trpadmin/city','trpadmin/trpadmin::city');
    $routes->get('trpadmin/trpadmin/insertCity','trpadmin/trpadmin::insertCity');

    $routes->get('trpadmin/quotation/insertCity','trpadmin/quotation::quotation');
    $routes->get('trpadmin/quotation/showData','trpadmin/quotation::showData');
    $routes->get('trpadmin/quotation/addQuotName','trpadmin/quotation::addQuotName');
    $routes->get('trpadmin/quotation/saveQuotation','trpadmin/quotation::saveQuotation');
    $routes->get('trpadmin/quotation/loadTalDist','trpadmin/quotation::loadTalDist');
    $routes->get('trpadmin/quotation/talDist','trpadmin/quotation::talDist');
    $routes->get('trpadmin/quotation/assignQuot','trpadmin/quotation::assignQuot');
    $routes->get('trpadmin/quotation/loadConQuot','trpadmin/quotation::loadConQuot');
    $routes->get('trpadmin/quotation/conData','trpadmin/quotation::conData');
    $routes->get('trpadmin/quotation/assignQuotation','trpadmin/quotation::assignQuotation');
    $routes->get('trpadmin/quotation/neeData','trpadmin/quotation::neeData');
    $routes->get('trpadmin/quotation/getQuotdata','trpadmin/quotation::getQuotdata');


    $routes->get('trpadmin/user/index','trpadmin/user::index');
    
    
    
    $routes->get('reactproject/reactCon/demo','reactproject/reactCon::demo');





    























});
/*
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
