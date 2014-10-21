<?php
namespace Kinash\JamStorageBundle\Service;
use Doctrine\ORM\EntityManager;
use Kinash\JamStorageBundle\Classes\CloneFactory;

class CloneService{

    protected $em;
    protected $cloneFactory;
    /**
     * @param EntityManager $entityManager
     * @param CloneFactory $cloneFactory
     */
    public function __construct(EntityManager $entityManager, CloneFactory $cloneFactory)
    {
        $this->em = $entityManager;
        $this->cloneFactory = $cloneFactory;
    }

    /**
     * @param $entity
     * @param $count
     */
    public function duplicate($entity, $count){
        for ($i = 0; $i < $count; $i++) {
            $newEntity =  $this->cloneFactory->cloneObject($entity);
            $this->em->persist($newEntity);
        }
        $this->em->flush();
    }
}