<?php

class InputModal
{
    private $_bobaName;
    private $_price;
    private $_quantity;
    private $_sweetness;
    private $_topping;
    function __construct($bobaName="",$price="",$quantity="",$sweetness="",$topping="")
    {
        $this->_bobaName = $bobaName;
        $this->_price = $price;
        $this->_quantity = $quantity;
        $this->_sweetness = $sweetness;
        $this->_topping = $topping;
    }

    /**
     * @return string
     */
    public function getBobaName()
    {
        return $this->_bobaName;
    }

    /**
     * @param string $bobaName
     */
    public function setBobaName($bobaName)
    {
        $this->_bobaName = $bobaName;
    }

    /**
     * @return mixed|string
     */
    public function getPrice(): mixed
    {
        return $this->_price;
    }

    /**
     * @param string $price
     */
    public function setPrice(mixed $price): void
    {
        $this->_price = $price;
    }

    /**
     * @return string
     */
    public function getQuantity(): mixed
    {
        return $this->_quantity;
    }

    /**
     * @param  string $quantity
     */
    public function setQuantity( $quantity)
    {
        $this->_quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getSweetness()
    {
        return $this->_sweetness;
    }

    /**
     * @param  string $sweetness
     */
    public function setSweetness( $sweetness)
    {
        $this->_sweetness = $sweetness;
    }

    /**
     * @return string
     */
    public function getTopping()
    {
        return $this->_topping;
    }

    /**
     * @param string $topping
     */
    public function setTopping($topping)
    {
        $this->_topping = $topping;
    }



}