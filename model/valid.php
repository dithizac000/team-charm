<?php
// use this validation for the checkout

/**
 * This static is to be use in our checkout.html where it prompts user to input if empty or re input if
 * the data is matched with our provided static function. Sole purpose is to ensure we
 * provide optional data in our SQL injections via phpMyAdmin
 */
class Valid
{
    /** Prompt user to input alphabetical letters for naming convetions
     * @param $name
     * @param $post
     * @param $placeholder
     * @return void
     */
    static function validName($name,$post,$placeholder)
    {
        global $f3;
        if (!ctype_alpha($name) || strlen($name) < 2) {
            $f3->set("errors[$post]", "$placeholder is invalid");
        }
        else {
            $_SESSION[$post] = $name;
        }
    }

    /** Prompt user to input a valid phone number
     * @param $phone
     * @param $post
     * @return void
     */
    static function validPhone($phone,$post)
    {
        global $f3;

        if(!preg_match('/^[0-9]{10}+$/', $phone)){
            $f3->set("errors['phone']", "Phone is invalid");
        } else {
            $_SESSION[$post] = $phone;
        }
    }

    /** Prompt user to input a validated email via PHP filter validated email
     * @param $email
     * @param $post
     * @return void
     */
    static function validEmail($email,$post)
    {
        global $f3;

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $f3->set("errors['email']", "Email is invalid");
        }
        else {
            $_SESSION[$post] = $email;
        }
    }

}
