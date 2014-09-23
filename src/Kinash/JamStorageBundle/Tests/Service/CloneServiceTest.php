<?php
namespace Kinash\JamStorageBundle\Tests\Service;
use  Kinash\JamStorageBundle\Service\CloneService;

class CloneServiceTest extends \PHPUnit_Framework_TestCase {
    /**
     * @dataProvider cloneProvider
     */
    public function testClone($count, $expectedCount)
    {
        $jam = $this->getMock('Kinash\JamStorageBundle\Entity\JamJar');

        $service = $this->getMock('Kinash\JamStorageBundle\Service\CloneService');
        $service->expects($this->exactly($expectedCount))
            ->method('duplicate')
            ->with($jam);

        $em = $this->getMockBuilder('\Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();
        $em->expects($this->exactly($expectedCount))
            ->method('persist');
        $em->expects($this->once())
            ->method('flush');


        $jamService = new JamService($em);
        $jamService->duplicate($jam, $count);

    }

    public function cloneProvider()
    {
        return array(
            array(1, 1),
            array(10, 10),
        );
    }
}
 