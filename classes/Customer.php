<?php

/**
 * In use with our boba website, this class is design to GET and SET
 * the user's personal information in order for it to be called and
 * store into our database
 */
class Customer
{
    // fields variables
    private $_customer_id;
    private $_first_name;
    private $_last_name;
    private $_email;
    private $_address;
    private $_country;
    private $_state;
    private $_zip_code;
    private $_register_date;
    private $_cost;

    /** Default constructor of the user class
     * @param $id
     * @param $fname
     * @param $lname
     * @param $email
     * @param $_address
     * @param $country
     * @param $state
     * @param $zip
     * @param $date
     * @param $cost
     */
    function __construct
    ($id="",$fname="",$lname="",$email="",$address="",$country="",$state="",$zip="",$cost="")
    {
        $this->_customer_id = (int) $id;
        $this->_first_name = $fname;
        $this->_last_name = $lname;
        $this->_email = $email;
        $this->_address = $address;
        $this->_country = $country;
        $this->_state = $state;
        $this->_zip_code = (int) $zip;
        $this->_cost = (double) $cost;
        $this->_register_date = date('Y-m-d');
    }
    /** get and
     * @return int of customer ID
     */
    public function getCustomerId(): int
    {
        return $this->_customer_id;
    }

    /**
     * @param int $id
     */
    public function setCustomerId($id)
    {
        $this->_customer_id = $id;
    }

    /**
     * @return get the first name
     */
    public function getFirstName()
    {
        return $this->_first_name;
    }

    /**
     * @param set the first name $first_name
     */
    public function setFirstName($first_name)
    {
        $this->_first_name = $first_name;
    }

    /**
     * @return get the last name
     */
    public function getLastName()
    {
        return $this->_last_name;
    }

    /**
     * @param set the last name $last_name
     */
    public function setLastName($last_name)
    {
        $this->_last_name = $last_name;
    }

    /**
     * @return get mail
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param set mail $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return get address
     */
    public function getAddress()
    {
        return $this->_address;
    }

    /**
     * @param set address $address
     */
    public function setAddress($address)
    {
        $this->_address = $address;
    }

    /**
     * @return get country
     */
    public function getCountry()
    {
        return $this->_country;
    }

    /**
     * @param set country $country
     */
    public function setCountry($country)
    {
        $this->_country = $country;
    }

    /**
     * @return get state
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param set state $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return get int zipcode
     */
    public function getZipCode(): int
    {
        return $this->_zip_code;
    }

    /**
     * @param set int $zip_code
     */
    public function setZipCode($zip_code)
    {
        $this->_zip_code = $zip_code;
    }

    /**
     * @return get join date
     */
    public function getRegisterDate()
    {
        return $this->_register_date;
    }

    /**
     * @param set  $register_date
     */
    public function setRegisterDate($register_date)
    {
        $this->_register_date = $register_date;
    }

    /**
     * @return get double cost
     */
    public function getCost(): double
    {
        return $this->_cost;
    }

    /**
     * @param set doubl $cost
     */
    public function setCost($cost)
    {
        $this->_cost = $cost;
    }

}