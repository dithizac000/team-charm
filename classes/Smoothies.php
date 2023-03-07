<?php

class Smoothies extends InputModal
{
    private $_base;

    /**
     * @return  get the base flavor of the smoothies avocado, mango or oreo+taro
     */
    public function getBase()
    {
        return $this->_base;
    }

    /**
     * @param   $base
     */
    public function setBase($base)
    {
        $this->_base = $base;
    }


}