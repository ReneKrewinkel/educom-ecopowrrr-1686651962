<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class AuthenticationController extends AbstractController
{

    #[Route('/checkLogin', name: 'app_isLogged')]
    public function checkLoggedIn(): Response
    {
        if($this->getUser()){
            return $this->redirect($this->generateUrl('app_logout'));
        }else{
            return $this->redirect($this->generateUrl('app_login'));
        }
    }
}
