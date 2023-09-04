<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Controller\AuthenticationController;

#[Route('/advisor')]
class AdvisorController extends AuthenticationController
{

    #[Route('/', name: 'app_advisor')]
    public function index(): Response
    {
        return $this->render('advisor/index.html.twig', [
            'controller_name' => 'AdvisorController',
        ]);
    }

    #[Route('/report', name: 'app_report')]
    public function generateReport()
    {
        echo "pior que isso nao existe";
    }

    #[Route('/addCustomer', name: 'create_user')]
    public function addUser()
    {
        echo "we are here m8";
    }
}
