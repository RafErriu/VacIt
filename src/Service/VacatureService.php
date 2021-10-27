<?php

namespace App\Service;

use App\Entity\Vacature;
use Doctrine\ORM\EntityManagerInterface;

class VacatureService {

    public function __construct(EntityManagerInterface $em)
    {
        $this->rep=$em->getRepository(Vacature::class);
    }

    public function getAllVacatures() {
        $vacatures = $this->rep->getAllVacatures();
        return($vacatures);
    }

}