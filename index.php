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

// define a default route (SDEV328/team-charm)
$f3->route('GET /', function() {
    //instantiate a view
    $view = new Template(); // template is a fat free class
    echo $view->render("views/home.html"); // render method, return text on template
});

// menu route
$f3->route('GET|POST /menu', function ($f3) {

    // if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // move data from POST array to SESSION array
        $boba = $_POST['boba-name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $sweetness = $_POST['sugar-level'];
        $topping = $_POST['topping'];
        $img = $_POST['teaImg'];
        $teaType = $_POST['tea-selection'];

            // instantiate a new input order
        if ($teaType) {
            $order = new FruitTea();
            $order->setTeaType($teaType);

        } else {
            $order = new ParentTea();
        }

        // assign to variable
        $order->setBobaName($boba);
        $order->setPrice($price);
        $order->setQuantity($quantity);
        $order->setSweetness($sweetness);
        $order->setTopping($topping);
        $order->setImg($img);

        // if orders[] does not exist
        if (!$_SESSION['orders'] ) {
            echo "in the if";
            // create orders[]
            // use for var. cart icon security
            $arr = [$order];
            $_SESSION['orders'] = $arr;
            // else
        } else {
            echo "in the else";
            $_SESSION['orders'][] = $order;
        }


        // prevent refresh of duplicated data from submit
        header("location: menu");
        exit;

    } // end of post if

    //instantiate a view
    $view = new Template(); /// template is a fat free class
    echo $view->render("views/menu.html"); // render method, return text on template
});

//cart route
$f3->route('GET /cart', function($f3) {
    echo '<pre>';
    Print_r ($_SESSION);
    echo '</pre>';

    foreach ($_SESSION['orders'] as $order) {
        $bobaName = $order->getBobaName();
        $price = $order->getPrice();
        $quantity = $order->getQuantity();
        $sweetness = $order->getSweetness();
        $topping = $order->getTopping();
        $img = $order->getImg();
    }

    //get cart size by counting the session order index
    $arraySize = count($_SESSION['orders']);

    // set cart size for cart page
    $f3->set('cartSize',$arraySize ); // use for cart size increment for menu page

    //instantiate a view
    $view = new Template(); // template is a fat free class
    echo $view->render("views/cart.html"); // render method, return text on template

});

//checkout form route
$f3->route('GET|POST /checkout', function($f3) {
    echo '<pre>';
    Print_r ($_SESSION);
    echo '</pre>';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
       /* $_SESSION['firstName'] = $_POST['firstName'];
        $_SESSION['lastName'] = $_POST['lastName'];
        $_SESSION['email'] = $_POST['email'];*/

        //validation for name
        $fname = trim($_POST['firstName']);
        if(Validation::validFName($fname)) {
            $_SESSION['firstName'] = $fname;
        } else {
            $f3->set('errors["firstName"]',
                'First name must be alphabetical characters only');
        }

        //validation for email
        $email = $_POST['email'];
        if(Validation::validEmail($email)){
            $_SESSION['email'] = $email;
        } else {
            $f3->set('errors["email"]',
                    'Enter a valid email');
        }

        //validation for phone number
        $phone = $_POST['phone'];
        if(Validation::validPhone($phone)){
            $_SESSION['phone'] = $phone;
        } else {
            $f3->set('errors["phone"]',
                    'Enter a valid phone number');
        }

        //if there are no errors go to the next page
        if(empty($f3->get('errors'))){
            $f3->reroute('summary');
        }
    }
    //instantiate a view
    $view = new Template(); // template is a fat free class
    echo $view->render("views/checkout.html"); // render method, return text on template
});

//summary page
$f3->route('GET /summary', function () {
    //instantiate a view
    $view = new Template(); // template is a fat free class
    echo $view->render("views/summary.html"); // render method, return text on template
    //destroy session array
    session_destroy();
});

/**
 * Admin page get route for owner to access data via jQuery
 */
$f3->route('GET /admin', function () {
    //instantiate a view
    $view = new Template(); // template is a fat free class
    echo $view->render("views/admin.html"); // render method, return text on template
});

/**
 * Account page when admin has been validated
 */
$f3->route('GET /account', function () {
    //instantiate a view
    $view = new Template(); // template is a fat free class
    echo $view->render("views/account.html"); // render method, return text on template
});
//run fat free
$f3->run();
