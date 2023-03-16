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
    ($id="",$fname="",$lname="",$email="",$_address="",$country="",$state="",$zip="",$date="",$cost="")
    {
        $this->_customer_id = (int) $id;
    }
    /** get and
     * @return int of customer ID
     */
    public function getCustomerId()
    {
        return (int) $this->_customer_id;
    }

    /**
     * @param int $customer_id
     */
    public function setCustomerId($customer_id)
    {
        (int) $this->_customer_id = $customer_id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->_first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name): void
    {
        $this->_first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->_last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name): void
    {
        $this->_last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->_address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->_address = $address;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->_country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->_country = $country;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->_state = $state;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->_zip_code;
    }

    /**
     * @param mixed $zip_code
     */
    public function setZipCode($zip_code): void
    {
        $this->_zip_code = $zip_code;
    }

    /**
     * @return mixed
     */
    public function getRegisterDate()
    {
        return $this->_register_date;
    }

    /**
     * @param mixed $register_date
     */
    public function setRegisterDate($register_date): void
    {
        $this->_register_date = $register_date;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->_cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost): void
    {
        $this->_cost = $cost;
    }

}