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
        
        
        // replace this example code with whatever you need
       // return $this->render('default/index.html.twig', array(
        //    'city' => $city,
        //));
        
        $location = new Location($city);
        
        $getWeahterProvider = $this->get('weather.provider.yahoo');


        
        
        $weather = $getWeahterProvider->fetch($location);

        $temp = round(($weather->getTemperature() - 32) / 1.8000, 0);

        return $this->render('default/index.html.twig', array(
            'weather' => $temp,
        ));

        
    }
}
