<?php

class FruitTea extends ParentTea
{
    private $_teaType;

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


}