<?php
//This is my controller

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload file
require_once('vendor/autoload.php');
//Start a session AFTER requiring autoload.php
session_start();
//session_destroy();

//instantiate F3 base class
$f3 = Base::instance();

//Instantiate a Controller and DataLayer object
$con = new Controller($f3);
$data = new DataLayer();

// define a default route (SDEV328/team-charm)
$f3->route('GET /', function() {
    $GLOBALS['con']->home();
});

// menu route
$f3->route('GET|POST /menu', function ($f3) {
    $GLOBALS['con']->menu();
});

//cart route
$f3->route('GET /cart', function($f3) {
    $GLOBALS['con']->cart();
});

//checkout form route
$f3->route('GET|POST /checkout', function($f3) {
    $GLOBALS['con']->checkout();
});

//summary page
$f3->route('GET /summary', function () {
    $GLOBALS['con']->summary();
});

/**
 * Admin page get route for owner to access data via jQuery
 */
$f3->route('GET /admin', function () {
    $GLOBALS['con']->admin();
});

/**
 * Account page when admin has been validated
 */
$f3->route('GET /account', function () {
    $GLOBALS['con']->account();
});
//run fat free
$f3->run();
