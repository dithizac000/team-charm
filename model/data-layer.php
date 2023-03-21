<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/../pdo-team-charm.php'); // connect sql via this file from home cPanel file manager

/**
 * This class DataLayer represents the access to our SQL database. These contain methods/functions
 * that deals with INSERT, UPDATE, and SELECT
 */
class DataLayer
{
    // Database connection object
    private $_dbh;

    /**
     * Default construct that try catch connection to PDO
     */
    function __construct()
    {
        try {
            //Instantiate a PDO object
            $this->_dbh = new PDO(DB_DRIVER, USERNAME, PASSWORD);
            //echo 'Successful!';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    /** This function INSERTS into the boba_order database
     * @param $orderObject
     * @return void
     */
    function addOrder($orderObject,$post) {
        // 1. DEFINE SQL Statement
        $sql = "INSERT INTO `boba_orders`
        (`boba_name`, `price`,`quantity`,`sweetness`,`toppings`, 
        `img`, `order_date`, `email`) 
        VALUES (:bobaName,:price,:quantity,:sweetness,:toppings,:img,:date,:email)";
        // 2. PREPARE STATEMENT
        $statement = $this->_dbh->prepare($sql);
        // 3. BIND PARAMETERS
        $bobaName = $orderObject->getBobaName();
        $price = $orderObject->getPrice();
        $quantity = $orderObject->getQuantity();
        $sweetness = $orderObject->getSweetness();
        $toppings = $orderObject->getTopping();
        $img = $orderObject->getImg();
        $date = date("Y-m-d");
        $email = $post;

        $statement->bindParam(':bobaName', $bobaName);
        $statement->bindParam(':price', $price);
        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':sweetness', $sweetness);
        $statement->bindParam(':toppings', $toppings);
        $statement->bindParam(':img', $img);
        $statement->bindParam(':date', $date);
        $statement->bindParam(':email', $email);

        // 4. EXECUTE
        $statement->execute();
    }

    /** This function INSERTS into the boba_order database
     * @param $orderObject
     * @return void
     */
    function addTeaOrder($orderObject,$post) {
        // 1. DEFINE SQL Statement
        $sql = "INSERT INTO `boba_orders`
        (`boba_name`, `price`,`quantity`,`tea_type`,`sweetness`,`toppings`, 
        `img`, `order_date`, `email`) 
        VALUES (:bobaName,:price,:quantity,:tea,:sweetness,:toppings,:img,:date,:email)";
        // 2. PREPARE STATEMENT
        $statement = $this->_dbh->prepare($sql);
        // 3. BIND PARAMETERS
        $bobaName = $orderObject->getBobaName();
        $price = $orderObject->getPrice();
        $quantity = $orderObject->getQuantity();
        $tea = $orderObject->getTeaType();
        $sweetness = $orderObject->getSweetness();
        $toppings = $orderObject->getTopping();
        $img = $orderObject->getImg();
        $date = date("Y-m-d");
        $email = $post;


        $statement->bindParam(':bobaName', $bobaName);
        $statement->bindParam(':price', $price);
        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':tea', $tea);
        $statement->bindParam(':sweetness', $sweetness);
        $statement->bindParam(':toppings', $toppings);
        $statement->bindParam(':img', $img);
        $statement->bindParam(':date', $date);
        $statement->bindParam(':email', $email);

        // 4. EXECUTE
        $statement->execute();
    }

    /** This functions fetch all the file in the data
     * @return void
     */
    function displayOrder($post)
    {
        $sql = "SELECT * FROM boba_orders  WHERE email = '$post' ORDER BY order_id"; // multi. rows
        $statement = $this->_dbh->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }


    /** This function INSERTS into the customer table database
     * @param $customerObject
     * @return void
     */
    function addCustomer($first,$last,$number,$mail,$total) {
        // 1. DEFINE SQL Statement
        $sql = "INSERT INTO `customer`(`first_name`, `last_name`, `phone`, `email`,`register_date`, `cost`) 
VALUES (:fname, :lname, :phone, :email, :date, :total)";
        // 2. PREPARE STATEMENT
        $statement = $this->_dbh->prepare($sql);
        // 3. BIND PARAMETERS
        $fname = $first;
        $lname = $last;
        $phone = $number;
        $email = $mail;
        $date = date("Y-m-d");
        $totalCost = $total;

        $statement->bindParam(':fname', $fname);
        $statement->bindParam(':lname', $lname);
        $statement->bindParam(':phone', $phone);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':date', $date);
        $statement->bindParam(':total', $totalCost);


        // 4. EXECUTE
        $statement->execute();
    }

    /** This functions fetch all the file in the data
     * @return void
     */
    function displayCustomer($post)
    {
        $sql = "SELECT * FROM customer WHERE email = '$post'"; // multi. rows
        $statement = $this->_dbh->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        global $f3; // reroute if the sql clause email is not matched in the database
        if(!$result) {
            $f3->reroute('admin');
        }
        return $result;

    }


} // END OF DataLayer