<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Entity\User;
use App\Entity\Sollicitatie;
use Symfony\Component\HttpFoundation\RedirectResponse;



/**
 * @Route("/profiel")
 */
class ProfielController extends AbstractController
{
    /**
     * @Route("/", name= "profiel")
     * @Template()
     */
    public function ophalenProfiel()
    {
        $id = $this->getUser()->getId();
        $rep = $this->getDoctrine()->getRepository(User::class);
        $user = $rep->getOneUser($id);
        
            return($this->render('profiel/index.html.twig',  ['user' => $user]));
            var_dump($user);
    }   

    /**
     * @Route("/sollicitaties/{id}", name="sollicitaties")
     * @Template()
     */
    public function ophalenSollicitaties($id)
    {

    $rep = $this->getDoctrine()->getRepository(Sollicitatie::class);
    $sollicitaties = $rep->getSollicitaties($id);

    return($this->render('profiel/sollicitaties.html.twig', ['sollicitaties' => $sollicitaties]));
    var_dump($sollicitaties);    
}

 /**
     * @Route("/opslaanSollicitatie/{id}", name="opslaanSollicitatie")
     */
    public function opslaanSollicitatie($id): RedirectResponse
    {   
        $user = $this->getUser();
        $user_id = $user->getId();

        $solli = array(
            "werknemer_id" => $user_id,
            "vacature_id" => $id,
            "uitgenodigd" => "N",
            
        );
        $rep = $this->getDoctrine()->getRepository(Sollicitatie::class);
        $sollicitaties = $rep->saveSollicitatie($solli);
        return $this->redirectToRoute('sollicitaties', ['id' => $user_id, 'sollicitaties' => $sollicitaties]);

        
     

    }
}

    
    
   


