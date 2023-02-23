<?php
//This is my controller

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload file
require_once('vendor/autoload.php');
require_once('model/functions.php');
require_once('model/modal-functions.php');

//instantiate F3 base class
$f3 = Base::instance();

// define a default route (SDEV328/team-charm)
$f3->route('GET /', function() {
    //instantiate a view
    $view = new Template(); // template is a fat free class
    echo $view->render("views/home.html"); // render method, return text on template
});
// menu route
$f3->route('GET|POST /menu', function ($f3) {

    /*
    // if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        var_dump($_POST); // For development process

        // move data from POST array to SESSION array
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['phone'] = $_POST['phone'];
        $_SESSION['state'] = $_POST['state'];


        // redirect to summary page
        $f3->reroute('experience');
    }*/

    //add output modal to hive
     $f3->set('echo["modal"]', getModal());

    //instantiate a view
    $view = new Template(); /// template is a fat free class
    echo $view->render("views/menu.html"); // render method, return text on template
});

//cart route
$f3->route('GET /cart', function() {
    //instantiate a view
    $view = new Template(); // template is a fat free class
    echo $view->render("views/cart.html"); // render method, return text on template
});

//checkout form route
$f3->route('GET /checkout', function() {
    //instantiate a view
    $view = new Template(); // template is a fat free class
    echo $view->render("views/checkout.html"); // render method, return text on template
});
//run fat free
$f3->run();
