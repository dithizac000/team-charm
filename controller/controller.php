<?php

/**
 * This controller class implement functions that renders the index.php section
 */
class Controller
{
    private $_f3; //Fat-Free object

    /** default constructor
     * @param $f3
     */
    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    /** first function of the main home page that renders the intro site of our boba shop
     * @return void
     */
    function home()
    {
        //instantiate a view
        $view = new Template();
        echo $view->render("views/home.html");

    }

    /** renders the menu secion of the nav bar, can be access in most page via nav
     * @return void
     */
    function menu()
    {
        echo "<pre>";
        echo print_r($_SESSION);
        echo print_r($_POST);
        echo "</pre>";
        // if the form has been posted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // move data from POST array to SESSION array
            $boba = $_POST['boba-name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $sweetness = $_POST['sugar-level'];
            $topping = $_POST['topping'];
            $img = $_POST['teaImg'];
            $teaType = $_POST['tea-selection'];
            echo $teaType;
            echo var_dump($_POST);

            // instantiate a new input order
            if($teaType) {
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
            if (!$_SESSION['orders']) {
                // create orders[]
                $arr = [$order];
                $_SESSION['orders'] = $arr;
                // else
            } else {
                // store orders in array object
                $_SESSION['orders'][] = $order;
            }
            echo "<pre>";
            echo print_r($_SESSION);
            echo print_r($_POST);

            echo "</pre>";
            // prevent refresh of duplicated data from submit
           // header("location: menu");
        }

        if (!empty($_SESSION['orders'])) {
            //get cart size by counting the session order index
            $GLOBALS['arraySize'] = count($_SESSION['orders']);
            // set cart size for menu page, above the cart icon nav bar
            $this->_f3->set('cartSize', $GLOBALS['arraySize']);
        }

        //instantiate a view
        $view = new Template(); /// template is a fat free class
        echo $view->render("views/menu.html"); // render method, return text on template
    }

    /** cart page will only render on top of nav when menu is added and statemetn are input if menu
     * empty it will render the home page instead
     * @return void
     */
    function cart()
    {
        echo var_dump($_POST);

        echo "<pre>";
        echo print_r($_SESSION);
        echo print_r($_POST);

        echo "</pre>";
        //instantiate a view
        $view = new Template(); // template is a fat free class
        if (empty($_SESSION)) {
            echo $view->render("views/home.html"); // render home when session is empty | destroy
        } else {
            $cost = 0; // use to hold cost of each order tea
            // each loop for @order get method call use in cart.html
            foreach ($_SESSION['orders'] as $order) {
                $bobaName = $order->getBobaName();
                $price = $order->getPrice();
                $quantity = $order->getQuantity();
                $sweetness = $order->getSweetness();
                $topping = $order->getTopping();
                $img = $order->getImg();
                $tea = $order->getTeaType();
                $cost += $price; // sum up the cost
            }


            $afterTax = round($cost*1.1, 2); // format as dollars and after tax calculations
            $this->_f3->set('total', $afterTax);

            echo $view->render("views/cart.html"); // render method, return text on template

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                echo $view->reroute("views/checkout.html");
            }
        }


    }

    /** checkout page renders after the cart has been filled, the user may skip cart review
     * and just type checkout if wanted due to get method
     * @return void
     */
    function checkout()
    {
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        //instantiate a view
        $view = new Template(); // template is a fat free class
        if (empty($_SESSION['orders'])) {
            echo $view->render("views/home.html"); // render home when session order is empty | destroy
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // post variables
                $fname = trim($_POST['firstName']);
                $lname = trim($_POST['lastName']);
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $country = $_POST['country'];
                $state = $_POST['state'];
                $zip = $_POST['zip'];
                $cost = $_POST['total'];
                $_SESSION['total'] = $cost;

                // call validation and return erorr within class if not true
                Valid::validName($fname, "firstName", "First name ");
                Valid::validName($lname, "lastName", "Last name " );
                Valid::validPhone($phone,"phone");
                Valid::validEmail($email,"email");
                // other post field does not require validation and is optional for user

                //if there are no errors go to the next page
                if (empty($this->_f3->get('errors'))) {
                    $this->_f3->reroute('summary');
                }
            }
            echo $view->render("views/checkout.html"); // render method, return text on template


        }
    } // end of cart
    /** summary page gets reroute via checkout due to its method post requirement. This is also the session destroyer
     * This page currently does not prevent user from jumping if the cart contains content. However, this
     * will render home if the session is empty.
     * @return void
     */
    function summary()
    {
        // each loop for @order get method call use in cart.html
        foreach ($_SESSION['orders'] as $order) {
            // call data layer and insert orders session into database
            $GLOBALS['data']->addOrder($order);
        }


        //instantiate a view
        $view = new Template();
        if (empty($_SESSION)) {
            echo $view->render("views/home.html"); // render home if session is empty
        } else {
            echo $view->render("views/summary.html"); // render summary page after checkout submit
            //destroy session array
        }

        session_destroy();
    }

    /** The main admin page that allow guest to log to view order status or for user to view history and points
     * @return void
     */
    function admin()
    {
        //Get the data from the model
        $display = $GLOBALS['data']->displayOrder();
        $this->_f3->set('displaying', $display);
        //instantiate a view
        $view = new Template();
        echo $view->render("views/admin.html");

    }

    /** allow user to view their account and order history when pass through admin page
     * @return void
     */
    function account()
    {
        //instantiate a view
        $view = new Template();
        echo $view->render("views/account.html");
    }

}