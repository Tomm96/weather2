<?php

namespace Nfq\WeatherBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/weather/{city}", name="homepage")
     */
    public function indexAction($city)
    {
        $location = new Location($city);

        $provider = $this->get('nfq_weather');

        $weather = $provider->fetch($location);

        return $this->render('default/index.html.twig', array(
            'weather' => $weather,
        ));
    }
}
