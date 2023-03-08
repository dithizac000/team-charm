<?php
//This is my controller

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload file
require_once('vendor/autoload.php');
//Start a session AFTER requiring autoload.php
session_start();

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
    var_dump($_POST);
    echo '</pre>';

    // if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
       // var_dump($_POST); // For development process

        // instantiate a new input order
        $order = new ParentTea();

        // move data from POST array to SESSION array
        $boba = $_POST['boba-name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $sweetness = $_POST['sugar-level'];
        $topping = $_POST['topping'];
        $teaType = $_POST['tea-selection'];

        // assign to variable
        $order->setBobaName($boba);
        $order->setPrice($price);
        $order->setQuantity($quantity);
        $order->setSweetness($sweetness);
        $order->setTopping($topping);
        if ($boba == 'Passion Fruit Iced Tea' || $boba == 'Berry Much Iced Tea' || $boba ==
            'Mango Iced Tea') {
            $order->setTeaType($teaType);
        }


        $_SESSION['orders[]'] = $order;
 /*
  * $_SESSION['orders[]'] = $obj1;
    $_SESSION['orders[]'] = $obj2;
 echo "<img src=menu-images/$imgName>";
  */
    } // end of post if


    //add output modal to hive
     //$f3->set('echo["modal"]', getModal());

    //instantiate a view
    $view = new Template(); /// template is a fat free class
   // $f3->set("imgName", "thai-milk-tea.jpg");
    echo $view->render("views/menu.html"); // render method, return text on template
});

//cart route
$f3->route('GET /cart', function($d3) {
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
