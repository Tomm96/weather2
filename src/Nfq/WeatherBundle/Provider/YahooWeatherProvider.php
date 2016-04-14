<?php
namespace Nfq\WeatherBundle\Provider;
use Nfq\WeatherBundle\Location;
use Nfq\WeatherBundle\Weather;
use Nfq\WeatherBundle\WeatherProviderException;
use Nfq\WeatherBundle\WeatherProviderInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

class YahooWeatherProvider implements WeatherProviderInterface
{
    /**
     * @param Location $location
     * @return Weather
     * @throws WeatherProviderException
     */
    public function fetch(Location $location): Weather
    {
        $city = $location->getCity();

        try {
            $json = file_get_contents('https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20
            where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22'.$city.'%2C%20'.$city.'%22)&
            format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys');

            $obj = json_decode($json, true);
            $temp = $obj['query']['results']['channel']['item']['condition']['temp'];
        } catch (Exception $e) {
            throw new WeatherProviderException("Can't get weather from Yahoo Provider. It seems that API doesn't work.
            Details: ".$e->getMessage(), 5);
        }

        if ($temp == "") {
            throw new WeatherProviderException("Can't get weather from Yahoo Provider.
             It seems that you typed unknown City name.", 5);
        }

        $temp = round(($temp - 32) / 1.8000, 0);

        return new Weather($temp);
    }
}