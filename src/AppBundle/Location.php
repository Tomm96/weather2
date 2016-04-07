<?php


namespace AppBundle;


class Location
{
    private $city;

    /**
     * Location constructor.
     * @param $city
     */
    public function __construct($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }
}