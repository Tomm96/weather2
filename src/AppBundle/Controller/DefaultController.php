<?php

namespace AppBundle\Controller;

use AppBundle\Location;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/weather/{city}", name="homepage")
     */
    public function indexAction($city)
    {
        $location = new Location($city);
        
        $getWeatherProvider = $this->get('weather.provider.yahoo');

        $weather = $getWeatherProvider->fetch($location);

        return $this->render('default/index.html.twig', array(
            'weather' => $weather->getTemperature(),
        ));
    }
}
