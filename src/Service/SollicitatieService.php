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

    public function getSolliVacci($vac) {
        $sollicitaties=$this->rep->getSolliVacci($vac);
        return($sollicitaties);
    }

    public function verwijderSollicitatie($id) {
        $sollicitatie=$this->rep->verwijderSollicitatie($id);
        return($sollicitatie);
    }

    public function uitnodigen($id) {
        $user=$this->rep->uitnodigen($id);
        return($user);
    }

    public function getSollicitatie($id) {
        $sollicitatie=$this->rep->getSollicitatie($id);
        return($sollicitatie);
    }


}