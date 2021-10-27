<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;

use App\Service\VacatureService;


class BaseController extends AbstractController
{

    protected $vac;
    
    public function __construct(VacatureService $vac) {
        $this->vac = $vac;

    }



}
