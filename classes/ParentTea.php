<?php

class ParentTea
{
    private $_bobaName;
    private $_price;
    private $_quantity;
    private $_sweetness;
    private $_topping;
    private $_img;

    function __construct($bobaName="",$price="",$quantity="",$sweetness="",$topping="",$img="")
    {
        $this->_bobaName = $bobaName;
        $this->_price = $price;
        $this->_quantity = $quantity;
        $this->_sweetness = $sweetness;
        $this->_topping = $topping;
        $this->_img = $img;
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
     * @return string
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->_price = $price;
    }

    /**
     * @return string
     */
    public function getQuantity()
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

    public function getImg()
    {
        return $this->_img;
    }

    /**
     * @param string img
     */
    public function setImg($img)
    {
        $this->_img = $img;
    }


}