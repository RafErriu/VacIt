<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;

use App\Service\VacatureService;
use App\Service\UserService;
use App\Service\SollicitatieService;



class BaseController extends AbstractController
{

    protected $vac;
    protected $use;
    protected $sol;

    
    public function __construct(VacatureService $vac, UserService $use, SollicitatieService $sol) {
        $this->vac = $vac;
        $this->use = $use;
        $this->sol = $sol;


    }

  


}
