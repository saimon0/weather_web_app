<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index()
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

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


    }
}
