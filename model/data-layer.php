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

    /** This function INSERTS into the customer table database
     * @param $customerObject
     * @return void
     */
    function addCustomer($customerObject) {

    }

    /** This function INSERTS into the boba_order database
     * @param $orderObject
     * @return void
     */
    function addOrders($orderObject) {
        // 1. DEFINE SQL Statement
        $sql = "INSERT INTO `boba_orders`
        (`order_id`, `boba_name`, `sweetness`, `toppings`, 
        `img`, `order_date`, `points`) 
        VALUES (:orderID,:bobaName,:sweetness,:toppings,:img,:date,:points)";
        // 2. PREPARE STATEMENT
        $statement = $this->_dbh->prepare($sql);
        // 3. BIND PARAMETERS
        $orderID = $orderObject->getOrderID();
        // 4. EXECUTE
        $statement->execute();
    }
} // END OF DataLayer