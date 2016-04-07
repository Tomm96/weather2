<?php


namespace AppBundle;


class Weather
{
    private $temperature;

    /**
     * Weather constructor.
     * @param $temp
     */
    public function __construct($temp)
    {
        $this->temperature = $temp;
    }

    /**
     * @return mixed
     */
    public function getTemperature()
    {
        return $this->temperature;
    }


}