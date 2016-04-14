<?php
namespace Nfq\WeatherBundle;
interface WeatherProviderInterface
{
    /**
     * @param Location $location
     * @return Weather
     * @throws WeatherProviderException
     */
    public function fetch(Location $location): Weather;

}