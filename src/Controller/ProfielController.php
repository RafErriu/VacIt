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
     * @Route("/updateProfiel/{id}", name= "updateProfiel")
     * @Template()
     */
    public function updateProfiel($id, Request $request)
    {
        $params = $request->request->all();

        $user = $this->getUser();
        $user_id = $user->getId();
        $profiel = $this->use->aanpassenUser($params);

        
        return $this->redirectToRoute('profiel', ['id' => $user_id]);
    }   

    /**
     * @Route("/saveProfiel", name="saveProfiel")
     */
    public function saveProfiel(Request $request)
    {

        $user = $this->getUser();
        $user_id = $user->getId();

        if(!$profiel){
            return $this->redirectToRoute('profiel', ['id' => $user_id]);
        }
        $this->addFlash('notice', $profiel);
        return $this->redirectToRoute('updateProfiel', ['id' => $user_id]);
  
    }

    /**
     * @Route("/sollicitaties/{id}", name="sollicitaties")
     * @Template()
     */
    public function ophalenSollicitaties($id)
    {
    $sollicitaties = $this->sol->getSollicitaties($id);

    return($this->render('profiel/sollicitaties.html.twig', ['sollicitaties' => $sollicitaties]));
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
        );

        $save =  $this->sol->saveSollicitatie($params);


        return ($this->redirectToRoute('sollicitaties', ['id' => $user_id]));
    }


}   
