<?php

namespace AppBundle;

interface WeatherProviderInterface

{

    public function fetch(Location $location): Weather;
    
}