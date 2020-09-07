<?php

namespace App\Applications;

use App\Exceptions\CountryCodeNotFoundException;

class Countries
{
    protected static $countries = [
        ['code' => 'CHL', 'country' => 'chile'],
        ['code' => 'ARG', 'country' => 'argentina'],
        ['code' => 'MEX', 'country' => 'mexico'],
    ];

    public static function all()
    {
        return self::$countries;
    }

    public static function findOrFail(string $code)
    {
        foreach (self::$countries as $countryInfo) {
            if ($countryInfo['code'] === $code) return $countryInfo;
        }

        Throw new CountryCodeNotFoundException;
    }

    public static function exists(string $code)
    {
        foreach (self::$countries as $countryInfo) {
            if ($countryInfo['code'] === $code) return true;
        }

        return false;
    }
}