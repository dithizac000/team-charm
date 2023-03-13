<?php

class Controller
{
    private $_f3; //Fat-Free object

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        //instantiate a view
        $view = new Template();
        echo $view->render("views/home.html");

    }

    function menu()
    {
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
    }

    function cart()
    {
        echo '<pre>';
        Print_r ($_SESSION);
        echo '</pre>';

        //instantiate a view
        $view = new Template(); // template is a fat free class
        if(empty($_SESSION)) {
            echo $view->render("views/home.html"); // render home when session is empty | destroy
        }

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
        $this->_f3->set('cartSize',$arraySize ); // use for cart size increment for menu page

        echo $view->render("views/cart.html"); // render method, return text on template

    }

    function checkout()
    {
        echo '<pre>';
        Print_r ($_SESSION);
        echo '</pre>';

        //instantiate a view
        $view = new Template(); // template is a fat free class
        if(empty($_SESSION['orders'])) {
            echo $view->render("views/home.html"); // render home when session order is empty | destroy
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //validation for name
            $fname = trim($_POST['firstName']);
            if(validation::validFName($fname)) {
                $_SESSION['firstName'] = $fname;
            } else {
                $this->_f3->set('errors["firstName"]',
                    'First name must be alphabetical characters only');
            }

            //validation for email
            $email = $_POST['email'];
            if(validation::validEmail($email)){
                $_SESSION['email'] = $email;
            } else {
                $this->_f3->set('errors["email"]',
                    'Enter a valid email');
            }

            //validation for phone number
            $phone = $_POST['phone'];
            if(validation::validPhone($phone)){
                $_SESSION['phone'] = $phone;
            } else {
                $this->_f3->set('errors["phone"]',
                    'Enter a valid phone number');
            }

            //if there are no errors go to the next page
            if(empty($this->_f3->get('errors'))){
                $this->_f3->reroute('summary');
            }
        }

        echo $view->render("views/checkout.html"); // render method, return text on template
    }

    function summary()
    {
        //instantiate a view
        $view = new Template();
        echo $view->render("views/summary.html");
        //destroy session array
        session_destroy();
    }

    function admin()
    {
        //instantiate a view
        $view = new Template();
        echo $view->render("views/admin.html");

    }

    function account()
    {
        //instantiate a view
        $view = new Template();
        echo $view->render("views/account.html");
    }
}