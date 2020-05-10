<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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

    /**
     * @Route("/scraping/data/scrap", name="scraping_data")
     */

    public function scrapWeatherData()
    {
        $locationUrl = "https://api.weather.com/v3/location/point?apiKey=d522aa97197fd864d36b418f39ebb323&format=json&language=pl-PL&placeid=210036ee3963854e507c1fdb804560b821aa8c0a25661de14efccf0c87f7f8c0";
        $observationUrl = "https://api.weather.com/v2/turbo/vt1observation?apiKey=d522aa97197fd864d36b418f39ebb323&format=json&geocode=52.40%2C16.92&language=pl-PL&units=m";
        $data = file_get_contents($observationUrl);
        $decodedJsonData = json_decode($data, true);
        #print_r($decodedJsonData);

        $observationId = $decodedJsonData['id'];
        $observationArray = $decodedJsonData['vt1observation'];

        echo "id: " . $observationId . "\n";
        $temperature = $observationArray['temperature'];
        $wind = $observationArray['windSpeed'];
        $observationTime = $observationArray['observationTime'];
        $observationTimeSplit = preg_split('[T+]', $observationTime);
        $observationDate = $observationTimeSplit[0];
        $observationHourArray = $observationTimeSplit[1];

        $observationHourArray = explode('+', $observationHourArray);
        $observationHour = $observationHourArray[0];
        echo " | observation date: " . $observationDate;
        echo " | observation hour: " . $observationHour;
        echo " | temperature: " . $temperature;

        $observationInfo = new Post();

        #$observationInfo->setDate();

        return new Response();
    }

}


