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
$routes->setDefaultController('Dashboard');
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
$routes->get('/', 'Dashboard::index');

$routes->group("api", ["namespace" => "App\Controllers", "filter" => "basicauth"] , function($routes){
    $routes->get("get_questions", "Rest_api::get_questions");
    $routes->get("get_question/(:num)", "Rest_api::get_question/$1");

    $routes->get("get_answers", "Rest_api::get_answers");
    $routes->get("get_answer/(:num)", "Rest_api::get_answer/$1");

    $routes->get("get_quiz", "Rest_api::get_quiz");
    $routes->get("get_quizd/(:num)", "Rest_api::get_quizd/$1");

    $routes->get("get_courses", "Rest_api::get_courses");
    $routes->get("get_course/(:num)", "Rest_api::get_course/$1");
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
