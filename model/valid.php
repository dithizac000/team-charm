<?php
// use this validation for the checkout

class Valid
{
    static function validFName($name)
    {
        return ctype_alpha($name);
    }

    static function validEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    static function validPhone($phone)
    {
        return filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    }
}
