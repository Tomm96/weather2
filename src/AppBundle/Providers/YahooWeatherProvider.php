<?php

namespace AppBundle\Providers;


use AppBundle\Location;
use AppBundle\Weather;
use AppBundle\WeatherProviderInterface;

class YahooWeatherProvider implements WeatherProviderInterface
{

    /**
     * @param Location $location
     * @return Weather
     */
    public function fetch(Location $location): Weather
    {
        $city = $location->getCity();

        $json = file_get_contents('https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22'.$city.'%2C%20'.$city.'%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys');
        $obj = json_decode($json, true);
        $temp = $obj['query']['results']['channel']['item']['condition']['temp'];

        return new Weather($temp);
    }
}