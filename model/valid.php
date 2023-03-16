<?php
// use this validation for the checkout

/**
 * This static is to be use in our checkout.html where it prompts user to input if empty or re input if
 * the data is matched with our provided static function. Sole purpose is to ensure we
 * provide optional data in our SQL injections via phpMyAdmin
 */
class Valid
{
    /** Prompt user to input alphabetical letters.
     * @param $name
     * @return bool
     */
    static function validFName($name)
    {
        return ctype_alpha($name);
    }

    /** Prompt user to input a validated email via PHP filter validated email
     * @param $email
     * @return mixed
     */
    static function validEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Prompt user to input a valid phone number
     */
    static function validPhone($phone)
    {
        return filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    }
}
