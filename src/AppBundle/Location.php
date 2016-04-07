<?php


namespace AppBundle;


class Location
{
    private $city;

    public function __construct($city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }
}