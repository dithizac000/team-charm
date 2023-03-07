<?php

class FruitTea
{
    private $_teaType;
    private $_flavor;

    /**
     * @return type of tea, which is black or green
     */
    public function getTeaType()
    {
        return $this->_teaType;
    }

    /**
     * @paramstring $teaType
     */
    public function setTeaType( $teaType)
    {
        $this->_teaType = $teaType;
    }

    /**
     * @return get the syrup to use, passion, berry or mango
     */
    public function getFlavor()
    {
        return $this->_flavor;
    }

    /**
     * @param string $flavor
     */
    public function setFlavor( $flavor)
    {
        $this->_flavor = $flavor;
    }



}