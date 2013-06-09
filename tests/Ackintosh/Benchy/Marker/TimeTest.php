<?php
use Ackintosh\Benchy\Marker\Time;

class TimeTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->time = new Time();
    }

    /**
     * @test
     */
    public function should_extends_AbstractMarker()
    {
        $expect = 'Ackintosh\Benchy\Marker\AbstractMarker';
        $this->assertInstanceOf($expect, $this->time);
    }

    public function test_before()
    {
        $this->time->before();
        $begin = new ReflectionProperty($this->time, 'begin');
        $begin->setAccessible(true);
        $this->assertTrue($begin->isPrivate());
        $this->assertInternalType('float', $begin->getValue($this->time));
    }

    public function test_after()
    {
        $this->time->after();
        $end = new Reflectionproperty($this->time, 'end');
        $end->setaccessible(true);
        $this->asserttrue($end->isprivate());
        $this->assertinternaltype('float', $end->getvalue($this->time));
    }
}
