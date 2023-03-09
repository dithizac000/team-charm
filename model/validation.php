<?php
// use this validation for the checkout

Class Validation
{
    static function validName($name)
    {
        return ctype_alpha($name);
    }

    static function validEmail($email)
    {
        return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
