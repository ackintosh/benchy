<?php
use Ackintosh\Benchy;

class BenchyTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function run_should_returns_Reporter_instance()
    {
        $reporter = Benchy::run(function ($reporter) {
            // dummy
        });
        $this->assertInstanceOf('Ackintosh\Benchy\Reporter', $reporter);
    }

    /**
     * @test
     */
    public function closure_should_receive_Reporter_instance()
    {
        $self = $this;// for older than php5.3
        Benchy::run(function ($reporter) use($self) {
            $self->assertInstanceOf('Ackintosh\Benchy\Reporter', $reporter);
        });
    }
}
