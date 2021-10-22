<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Entity\User;


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
        $users = $rep->getOneUser($id);
        var_dump($id);
        
            return($this->render('profiel/index.html.twig',  ['users' => $users]));
            var_dump($users);
    }   
}
