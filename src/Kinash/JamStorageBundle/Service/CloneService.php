<?php
namespace Kinash\JamStorageBundle\Service;
use Doctrine\ORM\EntityManager;
class CloneService{

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function duplicate($entity, $count){
        for ($i = 0; $i < $count; $i++) {
            $newEntity = clone $entity;
            $this->em->persist($newEntity);
        }
        $this->em->flush();
    }
}