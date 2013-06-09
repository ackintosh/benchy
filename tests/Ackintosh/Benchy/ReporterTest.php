<?php
use Ackintosh\Benchy\Reporter;

class ReporterTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->reporter = new Reporter();
    }

    /**
     * @test
     */
    public function repoter_has_observers()
    {
        $property_observers = new ReflectionProperty($this->reporter, 'observers');
        $property_observers->setAccessible(true);
        $this->assertTrue($property_observers->isPrivate());
        $observers = $property_observers->getValue($this->reporter);
        $this->assertEquals(1, count($observers));
        $this->assertArrayHasKey('time', $observers);
    }
}
