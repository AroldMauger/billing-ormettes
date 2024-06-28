<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController {

    #[Route('/dashboard', name:"dashboard")]
    public function dashboard()
    {
        return $this->render("pages/dashboard.html.twig");
    }


}