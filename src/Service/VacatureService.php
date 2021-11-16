<?php

namespace App\Service;

use App\Entity\Vacature;
use Doctrine\ORM\EntityManagerInterface;

class VacatureService {

    private $sys;

    public function __construct(EntityManagerInterface $em)
    {
        $this->rep=$em->getRepository(Vacature::class);
    }

    public function getAllVacatures() {
        $vacatures = $this->rep->getAllVacatures();
        return($vacatures);
    }

    public function getVacature($id)
    {
        $vacature = $this->rep->getVacature($id);
        return ($vacature);
    }

    public function getVacatureWG($user) {

        $vacature = $this->rep->getVacatureWG($user);
        return ($vacature);
    }

    public function bedrijfVacatures($werkgever_id) {
        $vacatures = $this->rep->bedrijfVacatures($werkgever_id);
        return($vacatures);
    }

    public function nieuweVac($vacatures) {
        
    $vacature= $this->rep ->nieuweVac($vacatures);
    return($vacature);
    }

    public function verwijderVacature($id) {
        $vacature=$this->rep->verwijderVacature($id);
        return($sollicitatie);
    }
    
 
}