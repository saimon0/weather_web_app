<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ScrapingDataController extends AbstractController
{
    /**
     * @Route("/scraping/data", name="scraping_data")
     */
    public function index()
    {
        return $this->render('scraping_data/index.html.twig', [
            'controller_name' => 'ScrapingDataController',
        ]);
    }


}

$url = file_get_contents("https://api.weather.com/v2/turbo/vt1observation?apiKey=d522aa97197fd864d36b418f39ebb323&format=json&geocode=52.40%2C16.92&language=pl-PL&units=m");
