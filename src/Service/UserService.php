<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserService {

    public function __construct(EntityManagerInterface $em)
    {
        $this->rep=$em->getRepository(User::class);
    }

    public function getOneUser($id) {
        $user = $this->rep->getOneUser($id);
        return($user);
    }

    public function getTheRecordType($record_type) {
        $record = $this->rep->getTheRecordType($record_type);
        return($record);
    }

    public function aanpassenUser($params){
        $user=$this->rep->aanpassenUser($params);
        return($user);
    }


    /*
    public function aanpassenUser($params, $id){
        $user=$this->rep->aanpassenUser($params);
   
        return($user);
    }
    */



}