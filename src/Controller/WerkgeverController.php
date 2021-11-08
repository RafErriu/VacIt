<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Entity\Vacature;
use App\Entity\User;
use App\Entity\Systeem;



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

    /**
     * @Route("/nieuweVacature", name= "nieuweVacature")]
     * @Template()
     */
    public function nieuweVacature()
    {
        $user = $this->getUser();
        $system = $this->sys->getAllSysteem();

        return ($this->render('werkgever/nieuweVac.html.twig',  ['system' => $system]));
    }

        /**
     * @Route("/vacatureOpslaan", name= "vacatureOpslaan")]
     * @Template()
     */
    public function vacatureOpslaan(Request $request)
    {
        $vacatures = $request->request->all();
        
        $system = $this->sys->getAllSysteem();
        $werkgever = $this->getUser();
        $werkgever_id = $werkgever->getId();
        
        $vacature = $this->vac->nieuweVac($vacatures);

        $id = $this->getUser()->getId();
        $vacatures = $this->vac->getVacatureWG($id);

        return $this->render('werkgever/index.html.twig', ['vacatures' => $vacatures]);
    }


}
