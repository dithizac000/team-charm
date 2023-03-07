<?php

class OrderList
{
    private $_orderItem;
    private $_orderArray;
    function __construct($orderNumber = '', $orderArray = '')
    {
        $this->_orderItem = $orderNumber;
        $this->_orderArray = $orderArray;
    }

    /**
     * @return int|
     */
    public function getOrderItem()
    {
        return $this->_orderItem;
    }

    /**
     * @param int| $orderItem
     */
    public function setOrderItem($orderItem)
    {
        $this->_orderItem = $orderItem;

    }

    /**
     * @return string
     */
    public function getOrderArray()
    {
        return $this->_orderArray;
    }

    /**
     * @param string $orderArray
     */
    public function setOrderArray($orderArray)
    {
        $this->_orderArray = $orderArray;
    }


}