<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Entity\Vacature;
use App\Entity\User;


/**
 * @Route("/werkgever")
 */
class WerkgeverController extends BaseController
{
    /**
     * @Route("/vacatures/{id}", name= "werkgever")]
     * @Template()
     */
    public function ophalenVacaturesWG($id)
    {

        $vacatures = $this->vac->getVacatureWG($id);
    

        return $this->render('werkgever/index.html.twig', ['vacatures' => $vacatures]);
    }

    /**
     * @Route("/profielWG/", name= "profielWG")]
     * @Template()
     */
    public function werkgeverProfiel()
    {
        $id = $this->getUser()->getId();
        $user = $this->use->getOneUser($id);
    

        return $this->render('werkgever/profielWG.html.twig', ['user' => $user]);
    }
}
