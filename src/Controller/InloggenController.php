<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Entity\Vacature;



/**
 * @Route("/inloggen")
 */
class InloggenController extends AbstractController
{
     /**
     * @Route("/", name= "inloggen")
     * @Template()
     */
    public function index()
    {
            $rep = $this->getDoctrine()->getRepository(Vacature::class);
            $vacatures = $rep->getAllVacatures();
            
            return['vacatures' => $vacatures];
    }
}
