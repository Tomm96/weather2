<?php
namespace AppBundle\Providers;

class OpenMapWeatherProvider implements WeatherProviderInterface
{

    /**
     * @param Location $location
     * @return Weather
     */
    public function fetch(Location $location): Weather
    {
        //some code here...
    }
}