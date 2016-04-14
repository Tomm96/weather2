<?php


namespace Nfq\WeatherBundle\Provider;


use Nfq\WeatherBundle\Location;
use Nfq\WeatherBundle\Weather;
use Nfq\WeatherBundle\WeatherProviderInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

class OpenMapWeatherProvider implements WeatherProviderInterface
{
    private $appID;

    /**
     * OpenMapWeatherProvider constructor.
     * @param string $appID
     */
    public function __construct(string $appID)
    {
        $this->appID = $appID;
    }

    /**
     * @param Location $location
     * @return Weather
     * @throws WeatherProviderException
     */
    public function fetch(Location $location): Weather
    {
        $city = $location->getCity();

        try {
            $json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$city.'
            &APPID='.$this->appID);

            $obj = json_decode($json, true);
            $temp = $obj['main']['temp'];
        } catch (Exception $e) {
            throw new WeatherProviderException("Can't get weather from OpenWeatherMap Provider.
             It seems that API doesn't work. Details: ".$e->getMessage(), 5);
        }

        if ($temp === "") {
            throw new WeatherProviderException("Can't get weather from OpenWeatherMap Provider.
             It seems that you typed unknown City name.", 5);
        }
        $temp = $temp - 273.15;

        return new Weather($temp);
    }
}