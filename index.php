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
    echo '<pre>';
    Print_r ($_SESSION);
    echo '</pre>';

    // if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //var_dump($_POST); // For development process

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
        if ($boba == 'Passion Fruit Iced Tea' || $boba == 'Berry Much Iced Tea' || $boba ==
            'Mango Iced Tea') {
            $order->setTeaType($teaType);
        }

//        if ($_SESSION['orders'])
//        $_SESSION['orders'] = array();
//        echo $arr;
        // if orders[] does not exist
        if (!$_SESSION['orders']) {
            echo "in the if";
            // create orders[]
            // use for var. cart icon security
            $arr = [$order];
            $_SESSION['orders'] = $arr;
        // else
        } else {
            echo "in the else";
            $content = 'cart'; //href header from menu to cart if click cart icon
            $_SESSION['orders'][] = $order;
        }

        // size of the orders array, use for cart size
        $arraySize = count($_SESSION['orders']);
        // set cart size for menu page only
        $f3->set('cartSize', "$arraySize"); // use for cart size increment for menu page
 /*
  * $_SESSION['orders[]'] = $obj1;
    $_SESSION['orders[]'] = $obj2;
 echo "<img src=menu-images/$imgName>";
  */
    } // end of post if

    //instantiate a view
    $view = new Template(); /// template is a fat free class
   // $f3->set("imgName", "thai-milk-tea.jpg");
    echo $view->render("views/menu.html"); // render method, return text on template
});

//cart route
$f3->route('GET /cart', function($f3) {
    echo '<pre>';
    Print_r ($_SESSION);
    echo '</pre>';

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
