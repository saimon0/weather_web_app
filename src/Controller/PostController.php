<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/post", name="post.")
 */

class PostController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }


    /**
     * @Route("/create", name="create")
     * @param Request $request
     * @return Response
     */

   public function create(Request $request)
    {
        $weatherInfo = new Post();

        $currentDate = date('d-m-Y');
        $date = strtotime($currentDate);
        $date = date_create_from_format('d-m-Y', $currentDate);
        $date->getTimestamp();
        $weatherInfo->setDate($date);

        $currentHour = date('H:i:s');
        $hour = strtotime($currentHour);
        $hour = date_create_from_format('H:i:s', $currentHour);
        $date->getTimestamp();
        $weatherInfo->setHour($hour);

        $location = 'Poznan';
        $weatherInfo->setLocation($location);

        $temperature = '23';
        $weatherInfo->setTemperature($temperature);

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($weatherInfo);
        $entityManager->flush();

        return new Response('WeatherInfo was sent to database');
    }
}
