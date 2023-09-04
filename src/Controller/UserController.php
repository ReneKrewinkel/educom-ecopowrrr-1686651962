<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\UserService;

#[Route('/user')]
class UserController extends AbstractController
{
    private $us;

    public function __construct(UserService $us){
        $this->us = $us;
    }


    #[Route('/', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/createDevice', name: 'app_createDevice')]
    public function generateReport()
    {
        $this->us->generateReport("22/11/2020");
    }
}
