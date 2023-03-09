<?php

class Controller
{
    private $_f3; //Fat-Free object

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function cart()
    {
        foreach($_SESSION['orders'] as $order){
            $name = $order->getBobaName();
            echo "<p>$name</p>";
            echo "<img src='menu-images/" . $order->getImg() . "'>";
        }
    }
}