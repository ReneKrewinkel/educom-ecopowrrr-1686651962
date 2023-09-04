<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use App\Service\AdvisorService;
use App\Service\UserService;


#[Route('/register')]
class RegisterController extends AbstractController
{
    private $as;
    private $us;

    public function __construct(AdvisorService $as, UserService $us){
        $this->as = $as;
        $this->us = $us;
    }

    #[Route('/user', name: 'register_user')]
    public function saveUser(){
        $user = [
            "email" => "daniel@try.co",
            "roles" => ["ROLE_ADVISOR"],
            "password" => "test",
            "bank_detail" => "NL3454676787645",
            "postcode" => "6211BF",
            "house_number" => "324"
        ];

        $this->as->createUser($user);
    }

    #[Route('/device', name: 'register_device')]
    public function saveDevice(){
        $device = [
            "owner_id" => "9",
            "type_id" => "3",
            "active" => "false"
        ];

        $this->us->createDevice($device);
    }
}
