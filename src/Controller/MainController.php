<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{   
    public function runStartSite() : Response {
        return $this->render('startSite.html.twig');
    }
}
