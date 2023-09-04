<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

use App\Entity\Device;
use App\Entity\DeviceType;
use App\Entity\User;
use App\Entity\Power;

class UserService {

    private $security;

    private $deviceRepository;
    private $userRepository;
    private $deviceTypeRepository;
    private $powerRepository;
    

    public function __construct(EntityManagerInterface $em, Security $security) {
        $this->deviceRepository = $em->getRepository(Device::class);
        $this->userRepository = $em->getRepository(User::class);
        $this->deviceTypeRepository = $em->getRepository(DeviceType::class);
        $this->powerRepository = $em->getRepository(Power::class);
        $this->security = $security;
    }

    public function deactivateAccount(): void 
    {
        $user = $this->userRepository->find($this->security->getUser()->getId());

        $user->setStatus(false);

        $this->userRepository->save($user, true);
    }

    public function createDevice($params): void
    {
        if(isset($params["id"]) && $params["id"] != "") {
            $device = $this->deviceRepository->find($params["id"]);
        } else {
            $device = new Device();
        }
        $device->setOwner($this->userRepository->find($params["owner_id"]));
        $device->setType($this->deviceTypeRepository->find($params["type_id"]));
        if($params["active"] == "true"){
            $device->setActive(true);
        }else{
            $device->setActive(false);
        }

        $this->deviceRepository->save($device, true);
    }

    public function changeDeviceStatus($device_id): void
    {
        $device = $this->deviceRepository->find($device_id);

        $device->setActive(!$device->isActive());

        $this->deviceRepository->save($device, true);
    }

    public function generateReport($date): Response
    {
        $data = [
            "message_serialnumber" => "2323",
            "user_id" => $this->security->getUser()->getId(),
            "user_status" => $this->security->getUser()->isStatus(),
            "date" => $date
        ];

        //GET DEVICES OF USER
        $devices = $this->security->getUser()->getDevices()->toArray();

        //GET POWER OF EACH DEVICE
        foreach ($devices as $device){
            

            
        }
        dd($data);

        return $data;
    }

    public function getPower(Device $device): Response
    {
        $powers = $this->powerRepository->findBy(array('device_id' => $device->getId()));

        foreach ($powers as $power){
            
        }
    }

}