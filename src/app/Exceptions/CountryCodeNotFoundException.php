<?php

namespace App\Exceptions;

use Exception;

class CountryCodeNotFoundException extends Exception
{
    public function __construct($message = 'Invalid country code.')
    {
        parent::__construct($message);
    }
}
