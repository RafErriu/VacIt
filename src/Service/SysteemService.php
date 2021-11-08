<?php

namespace App\Service;

use App\Entity\Systeem;
use Doctrine\ORM\EntityManagerInterface;

class SysteemService {

    public function __construct(EntityManagerInterface $em)
    {
        $this->rep=$em->getRepository(Systeem::class);
    }

    public function getAllSysteem() {
        $systeem = $this->rep->getAllSysteem();
        return($systeem);
    }

    public function getSysteem($id) {
        $systeem = $this->rep->getSysteem($id);
        return($systeem);
    }

}