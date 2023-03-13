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

} // END OF DataLayer