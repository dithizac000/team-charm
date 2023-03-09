<?php
/**
 * ParenTea class acts as a parent Inheritance. This class contains the get and set methods for use
 * under the modal input form from the menu page. This class is use for sessions storage via modal
 * post
 */
class ParentTea
{
    private $_bobaName;
    private $_price;
    private $_quantity;
    private $_sweetness;
    private $_topping;
    private $_img;

    /** Constructor for the ParentTea class
     * @param $bobaName
     * @param $price
     * @param $quantity
     * @param $sweetness
     * @param $topping
     * @param $img
     */
    function __construct($bobaName="",$price="",$quantity="",$sweetness="",$topping="",$img="")
    {
        $this->_bobaName = $bobaName;
        $this->_price = $price;
        $this->_quantity = $quantity;
        $this->_sweetness = $sweetness;
        $this->_topping = $topping;
        $this->_img = $img;
    }

    /** Get the boba name from modal form
     * @return mixed|string
     */
    public function getBobaName()
    {
        return $this->_bobaName;
    }

    /** set the @bobaName
     * @param $bobaName
     * @return void
     */
    public function setBobaName($bobaName)
    {
        $this->_bobaName = $bobaName;
    }

    /** Get the price from modal form
     * @return mixed|string
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /** set the @price
     * @param $price
     * @return void
     */
    public function setPrice($price)
    {
        $this->_price = $price;
    }

    /** Get the boba name from modal form
     * @return mixed|string
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }

    /** set the @quantity
     * @param $quantity
     * @return void
     */
    public function setQuantity( $quantity)
    {
        $this->_quantity = $quantity;
    }

    /** Get the boba name from modal form
     * @return mixed|string
     */
    public function getSweetness()
    {
        return $this->_sweetness;
    }

    /** set the @sweetness
     * @param $sweetness
     * @return void
     */
    public function setSweetness( $sweetness)
    {
        $this->_sweetness = $sweetness;
    }

    /** Get the boba name from modal form
     * @return mixed|string
     */
    public function getTopping()
    {
        return $this->_topping;
    }

    /** set the @topping
     * @param $topping
     * @return void
     */
    public function setTopping($topping)
    {
        $this->_topping = $topping;
    }

    /** Get the boba name from modal form
     * @return mixed|string
     */
    public function getImg()
    {
        return $this->_img;
    }

    /** set the @img
     * @param $img
     * @return void
     */
    public function setImg($img)
    {
        $this->_img = $img;
    }


}