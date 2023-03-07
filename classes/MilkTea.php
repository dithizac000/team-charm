<?php

class MilkTea extends InputModal
{
    private $_milkType;

    /**
     * @return type of milk flavors, classic milk, green milk, or thai milk
     */
    public function getMilkType()
    {
        return $this->_milkType;
    }

    /**
     * @param   $milkType
     */
    public function setMilkType($milkType)
    {
        $this->_milkType = $milkType;
    }




}