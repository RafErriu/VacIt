<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Entity\Vacature;
use App\Entity\Systeem;
use App\Entity\Sollicitatie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;



/**
 * @Route("/")
 */
class HomepageController extends BaseController
{
    /**
     * @Route("/", name= "homepage")
     * @Template()
     */
    public function index()
    {
     
            $user = $this->getUser();
            $vacatures = $this->vac->getAllVacatures();
            
            return['vacatures' => $vacatures, 'user' => $user];
    }

     /**
     * @Route("/vacature/{id}", name= "vacature")
     * @Template()
     */
    public function vacature($id)
    {
        $vacature = $this->vac->getVacature($id);
        $werkgever_id = $vacature->getWerkgever()->getId();
        $vacatures = $this->vac->bedrijfVacatures($werkgever_id);



        $sollicitaties = $this->sol->getSolliVacci($vacature);
        

        return($this->render('homepage/vacature.html.twig', ['vacature' => $vacature, 'vacatures' => $vacatures, 'sollicitaties' => $sollicitaties]));
}

     /**
     * @Route("/uitnodigen/{id}", name= "uitnodigen")
     * @Template()
     */
    public function uitnodiging($id) {

        $us_id = $this->getUser()->getId();

        // $werkgever_id= $this->getUser()->getId();
        $sollicitatie = $this->sol->uitnodigen($id);
        return $this->redirectToRoute('werkgever', ['id' => $us_id]);
    }

    /**
     * @Route("/vacatures", name= "vacatures")
     * @Template()
     */
    public function vacatures()
    {
     
            $user = $this->getUser();
            $vacatures = $this->vac->getAllVacatures();
            
            return ($this->render('homepage/vacatures.html.twig', ['vacatures' => $vacatures, 'user' => $user]));
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
