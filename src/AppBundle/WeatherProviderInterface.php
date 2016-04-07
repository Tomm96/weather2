<?php

namespace AppBundle;

interface WeatherProviderInterface

{

    /**
     * @param Location $location
     * @return Weather
     */
    public function fetch(Location $location): Weather;
    
}