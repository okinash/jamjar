<?php
namespace Kinash\JamStorageBundle\Tests\Service;
use  Kinash\JamStorageBundle\Service\CloneService;

class CloneServiceTest extends \PHPUnit_Framework_TestCase {
    /**
     * @dataProvider cloneServiceDataProvider
     */
    public function testCloneService($count, $expectedCount)
    {

        #mock entity
        $jam = $this->getMock('Kinash\JamStorageBundle\Entity\JamJar');

        #mock clone Factory
        $cloneFactory = $this->getMock('Kinash\JamStorageBundle\Classes\CloneFactory');

        #mock Entity Manager
        $em = $this->getMockBuilder('\Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();


        #Check EntityManager Methods Calls
        $em->expects($this->exactly($expectedCount))
            ->method('persist');
        $em->expects($this->once())
            ->method('flush');

        #Check CloneFactory::cloneObject method calls
        $cloneFactory->expects($this->exactly($expectedCount))
            ->method('cloneObject')
            ->with($jam);


        $cloneService = new CloneService($em, $cloneFactory);
        $cloneService->duplicate($jam, $count);

    }

    /**
     * data provider for testCloneService
     * @return array
     */
    public function cloneServiceDataProvider()
    {
        return array(
            'success1' => array(
                'count' => 1,
                'expectedCount' => 1,
            ),
            'success2' => array(
                'count' => 5,
                'expectedCount' =>5,
            ),
        );
    }
}
 