<?php


namespace AppBundle;


class Weather
{
    private $temperature;

    public function __construct($temp)
    {
        $this->temperature = $temp;
    }

    public function getTemperature()
    {
        return $this->temperature;
    }


}