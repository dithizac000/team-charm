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
    // if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
       // var_dump($_POST); // For development process
        // instantiate a new input order
        $newOrder = new InputModal();
        $milkOrder = new MilkTea();
        $fruitOrder = new FruitTea();
        $smoothieOrder = new Smoothies();

        // move data from POST array to SESSION array
        $boba = $_POST['boba-name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $sweetness = $_POST['sugar-level'];
        $topping = $_POST['topping'];
        $teaType = $_POST['tea-selection'];

        $newOrder->setBobaName($boba);
        $newOrder->setPrice($price);
        $newOrder->setQuantity($quantity);
        $newOrder->setSweetness($sweetness);
        $newOrder->setTopping($topping);

        // switch statement for determining which order
        switch ($boba) {
            // 1-3: Milk, 4-6: Fruit, 7-9: Smoothies
            case 'Milk Tea':
                $milkOrder->setMilkType("Classic Milk");
                break;
            case 'Jasmine Green Tea':
                $milkOrder->setMilkType("Green Milk");
                break;
            case 'Thai Tea':
                $milkOrder->setMilkType("Thai Milk");
                break;
            case 'Passion Fruit Iced Tea':
                $fruitOrder->setTeaType($teaType);
                $fruitOrder->setFlavor('Passion Fruit');
                break;
            case 'Berry Much Iced Tea':
                $fruitOrder->setTeaType($teaType);
                $fruitOrder->setFlavor('Mix Berries');
                break;
            case 'Mango Iced Tea':
                $fruitOrder->setTeaType($teaType);
                $fruitOrder->setFlavor('Mango Syrup');
                break;
            case 'Avocado Smoothie':
                $smoothieOrder->setBase('Avocado');
                break;
            case 'Mango Icy':
                $smoothieOrder->setBase('Champagne Mango');
                break;
            case 'Galaxy Swirl':
                $smoothieOrder->setBase('Oreo & Taro');
                break;
        }

    }

    //add output modal to hive
     //$f3->set('echo["modal"]', getModal());

    //instantiate a view
    $view = new Template(); /// template is a fat free class
    echo $view->render("views/menu.html"); // render method, return text on template
});

//cart route
$f3->route('GET /cart', function() {
    var_dump($_POST);
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
