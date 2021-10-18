<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Vacature;

/**
 * @Route("/")
 */
class HomepageController extends AbstractController
{
    /**
     * @Route("/", name= "homepage")
     */
    public function index()
    {
        $rep = $this->getDoctrine()->getRepository(Vacature::class);
        $data = $rep->getAllVacatures(); 
        dump($data);
        die(); 
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }
}
