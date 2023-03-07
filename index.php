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
    var_dump($_POST);
    // if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
       // var_dump($_POST); // For development process

        // instantiate a new input order
        //$newOrder = new InputModal();
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

        // set loop
        $setMilk = $milkOrder->setBobaName($boba) . $milkOrder->setPrice($price) . $milkOrder->setQuantity($quantity). $milkOrder->setSweetness($sweetness) . $milkOrder->setTopping($topping);
        $setFruit = $fruitOrder->setBobaName($boba) . $fruitOrder->setPrice($price) . $fruitOrder->setQuantity($quantity). $fruitOrder->setSweetness($sweetness) . $fruitOrder->setTopping($topping);
        $setSmoothies = $smoothieOrder->setBobaName($boba) . $smoothieOrder->setPrice($price) . $smoothieOrder->setQuantity($quantity). $smoothieOrder->setSweetness($sweetness) . $smoothieOrder->setTopping($topping);

        // switch statement for determining which order
        switch ($boba) {
            // 1-3: Milk, 4-6: Fruit, 7-9: Smoothies
            case 'Milk Tea':
                $milkOrder->setMilkType("Classic Milk");
                $setMilk;
                $_SESSION['milkOrder'] = $milkOrder;
                break;
            case 'Jasmine Green Tea':
                $milkOrder->setMilkType("Green Milk");
                $setMilk;
                $_SESSION['milkOrder'] = $milkOrder;
                break;
            case 'Thai Tea':
                $milkOrder->setMilkType("Thai Milk");
                $setMilk;
                $_SESSION['milkOrder'] = $milkOrder;
                break;
            case 'Passion Fruit Iced Tea':
                $fruitOrder->setTeaType($teaType);
                $fruitOrder->setFlavor('Passion Fruit');
                $setFruit;
                break;
            case 'Berry Much Iced Tea':
                $fruitOrder->setTeaType($teaType);
                $fruitOrder->setFlavor('Mix Berries');
                $setFruit;
                $_SESSION['fruitOrder'] = $fruitOrder;
                break;
            case 'Mango Iced Tea':
                $fruitOrder->setTeaType($teaType);
                $fruitOrder->setFlavor('Mango Syrup');
                $setFruit;
                $_SESSION['fruitOrder'] = $fruitOrder;
                break;
            case 'Avocado Smoothie':
                $smoothieOrder->setBase('Avocado');
                $setSmoothies;
                $_SESSION['smoothieOrder'] = $smoothieOrder;
                break;
            case 'Mango Icy':
                $smoothieOrder->setBase('Champagne Mango');
                $setSmoothies;
                $_SESSION['smoothieOrder'] = $smoothieOrder;
                break;
            case 'Galaxy Swirl':
                $smoothieOrder->setBase('Oreo & Taro');
                $setSmoothies;
                $_SESSION['smoothieOrder'] = $smoothieOrder;
                break;

        } // end of switch

    } // end of post if


    //add output modal to hive
     //$f3->set('echo["modal"]', getModal());

    //instantiate a view
    $view = new Template(); /// template is a fat free class
    echo $view->render("views/menu.html"); // render method, return text on template
});

//cart route
$f3->route('GET /cart', function() {
    Print_r ($_SESSION);

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
