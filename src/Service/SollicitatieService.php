<?php

namespace App\Service;

use App\Entity\Sollicitatie;
use Doctrine\ORM\EntityManagerInterface;

class SollicitatieService {

    public function __construct(EntityManagerInterface $em)
    {
        $this->rep=$em->getRepository(Sollicitatie::class);
    }

    public function getSollicitaties($user) {

        $sollicitatie = $this->rep->getSollicitaties($user);
        return ($sollicitatie);
    }

    public function saveSollicitatie($params) {

        $sollicitatie =$this->rep->saveSollicitatie($params);
        return($sollicitatie);
    }

    public function getSolliVacci($werkgever) {
        $sollicitaties=$this->rep->getSolliVacci($werkgever);
        return($sollicitaties);
    }

}