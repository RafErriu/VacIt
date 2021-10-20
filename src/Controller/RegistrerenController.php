<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Entity\Vacature;
use App\Entity\User;



/**
 * @Route("/registreren")
 */
class RegistrerenController extends AbstractController
{
     /**
     * @Route("/", name= "registreren")
     * @Template()
     */
    public function index() {
  
    }

     /**
     * @Route("/toevoegen", name= "toevoegen")
     * @Template()
     */
    /*
    public function UserMaken()
        {
            $params = array(
                "email" => "john@hotmail.com",
                "roles" => ["ROLE_WERKNEMER"],
                "password" => "johnjohnjohn",
                "voornaam" => "John",
                "achternaam" => "de Vries",
                "geboortedatum" => "23-10-1990",
                "telefoonnummer" => 0657152456,
                "adres" => "woonplaats 6",
                "postcode" => "8274JN",
                "woonplaats" => "Grathem",
                "motivatie" => "",
                "cv" => "",
                "record_type" => "N",
            );
            $rep = $this->getDoctrine()->getRepository(User::class);
            $use = $rep->nieuweUser($params);
    
            dump($use);
            }
            */
}