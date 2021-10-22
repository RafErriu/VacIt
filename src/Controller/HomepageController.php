<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Entity\Vacature;
use App\Entity\Systeem;

/**
 * @Route("/")
 */
class HomepageController extends AbstractController
{
    /**
     * @Route("/", name= "homepage")
     * @Template()
     */
    public function index()
    {
            $rep = $this->getDoctrine()->getRepository(Vacature::class);
            $vacatures = $rep->getAllVacatures();
            
            return['vacatures' => $vacatures];
    }

     /**
     * @Route("/vacature/{id}", name= "vacature")
     * @Template()
     */
    public function vacature($id)
    {
        $rep = $this->getDoctrine()->getRepository(Vacature::class);
        $vacature = $rep->getVacature($id);
        
        return($this->render('homepage/vacature.html.twig', ['vacature' => $vacature]));
}
    
     /**
     * @Route("/", name= "homepage")
     * @Template()
     */
    /*
    public function vacatureMaken()
    {
        $vacatures = array(
            "titel" => "Goede Baan",
            "niveau" => "Medior",
            "omschrijving" => "Goede baan, lekker werken",
            "systeem_id" => 2,
            "werkgever_id" => 12
        );
        $rep = $this->getDoctrine()->getRepository(Vacature::class);
        $vac = $rep->nieuweVacature($vacatures);

        return $this->render('homepage/index.html.twig');
        dump($vacature);
    }
    */
}
