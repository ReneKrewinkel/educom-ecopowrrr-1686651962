<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use App\Entity\User;
use App\Entity\DeviceType;

class AdvisorService {

    private $userRepository;
    private $deviceTypeRepository;
    private $passwordHasher;

    public function __construct(EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher) {
        $this->userRepository = $em->getRepository(User::class);
        $this->deviceTypeRepository = $em->getRepository(DeviceType::class);
        $this->passwordHasher = $passwordHasher;
    }

    public function createDeviceType($params){
        $data = [
            "id" => (isset($params["id"]) && $params["id"] != "") ? $params["id"] : null,
            "name" => $params["name"]
        ];
        
        $this->deviceTypeRepository->save($data, true);
    }


    public function createUser($params) {
        if(isset($params["id"]) && $params["id"] != "") {
            $user = $this->userRepository->find($params["id"]);
        } else {
            $user = new User();
        }

        $user->setEmail($params["email"]);
        $user->setRoles($params["roles"]);
        $user->setPassword($this->passwordHasher->hashPassword($user, $params["password"]));
        $user->setBankDetail($params["bank_detail"]);   
        $user->setPostcode($params["postcode"]);  
        $user->setHouseNumber($params["house_number"]);
        $user->setStatus(true);
        
        $this->userRepository->save($user, true);
    }

    public function getOverviewAllCustomers(){
        
    }

    public function getOverviewMunicipality(){

    }

    public function getOverviewWithPrediction(){

    }
}