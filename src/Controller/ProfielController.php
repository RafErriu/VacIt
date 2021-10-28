<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Entity\Sollicitatie;
use App\Entity\Vacature;
use Symfony\Component\HttpFoundation\RedirectResponse;



/**
 * @Route("/profiel")
 */
class ProfielController extends BaseController
{
    /**
     * @Route("/", name= "profiel")
     * @Template()
     */
    public function ophalenProfiel()
    {
        $id = $this->getUser()->getId();
        $user = $this->use->getOneUser($id);
        
            return($this->render('profiel/index.html.twig',  ['user' => $user]));
            var_dump($user);
    }   

    /**
     * @Route("/saveProfiel/{id}", name= "saveProfiel")
     * @Template()
     */
    public function saveProfiel($id)
    {
        $user = $this->getUser();
        $user_id = $user->getId();
        
        $params = array(
            "woonplaats" => "Hallo",
  
        );        $user = $this->use->aanpassenUser($params);

        return $this->redirectToRoute('profiel', ['id' => $user_id]);

    }   

    /**
     * @Route("/sollicitaties/{id}", name="sollicitaties")
     * @Template()
     */
    public function ophalenSollicitaties($id)
    {

    $sollicitaties = $this->sol->getSollicitaties($id);

    return($this->render('profiel/sollicitaties.html.twig', ['sollicitaties' => $sollicitaties]));
    var_dump($sollicitaties);    
}

 /**
     * @Route("/opslaanSollicitatie/{id}", name="opslaanSollicitatie")
     * @Template()
     */
    public function opslaanSollicitatie($id)
    {   
        $user = $this->getUser();
        $user_id = $user->getId();


        $params = array(
            "werknemer" => $user_id,
            "vacature_id" => $id,
            "uitgenodigd" => "N",
            "datum" => new \DateTime('@'.strtotime('now'))
        );

        $save =  $this->sol->saveSollicitatie($params);


        return ($this->redirectToRoute('sollicitaties', ['id' => $user_id]));
    }


}   
