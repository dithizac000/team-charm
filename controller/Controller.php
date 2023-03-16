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

            foreach ($_SESSION['orders'] as $key =>$value) {
                echo "<h1>$key</h1>";

            }

            // prevent refresh of duplicated data from submit
            header("location: menu");
        } // end of post if

        if(!empty($_SESSION['orders'])) {
            //get cart size by counting the session order index
            $GLOBALS['arraySize'] = count($_SESSION['orders']);
            // set cart size for menu page, above the cart icon nav bar
            $this->_f3->set('cartSize', $GLOBALS['arraySize']);
        }

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
        } else {

            foreach ($_SESSION['orders'] as $key => $order) {
                echo "<h1>$key</h1>";
                $bobaName = $order->getBobaName();
                $price = $order->getPrice();
                $quantity = $order->getQuantity();
                $sweetness = $order->getSweetness();
                $topping = $order->getTopping();
                $img = $order->getImg();
                // insert into database via boba_orders table
                $GLOBALS['data']->addOrder($order);
                echo  "HELLO";
            }

            echo $view->render("views/cart.html"); // render method, return text on template

        }

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
        } else {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                //validation for name
                $fname = trim($_POST['firstName']);
                if(Valid::validFName($fname)) {
                    $_SESSION['firstName'] = $fname;
                } else {
                    $this->_f3->set('errors["firstName"]',
                        'First name must be alphabetical characters only');
                }

                //validation for email
                $email = $_POST['email'];
                if(Valid::validEmail($email)){
                    $_SESSION['email'] = $email;
                } else {
                    $this->_f3->set('errors["email"]',
                        'Enter a valid email');
                }

                //validation for phone number
                $phone = $_POST['phone'];
                if(Valid::validPhone($phone)){
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

    }

    function summary()
    {
        //instantiate a view
        $view = new Template();
        if(empty($_SESSION ) ) {
            echo $view->render("views/home.html"); // render home if session is empty
        } else {
            echo $view->render("views/summary.html"); // render summary page after checkout submit
            //destroy session array
        }

        session_destroy();
    }

    function admin()
    {
        //Get the data from the model
        $display = $GLOBALS['data']->displayOrder();
        $this->_f3->set('displaying', $display);
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