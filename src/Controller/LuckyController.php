<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * LuckyController
 * 
 * @return Response
 */
class LuckyController extends AbstractController
{
    public function number(): Response
    {
        $number = random_int(0, 100);

        // return new Response('<html><bod>Lucky number: ' .$number . '</body></html>');

        return $this->render('lucky/number.html.twig', ['number' => $number]);
    }
}
