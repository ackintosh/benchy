<?php
namespace Ackintosh\Benchy\Marker;

class Time extends AbstractMarker
{
    private $begin;
    private $begin_per_laps;
    private $end;
    private $laps = array();

    public function __construct()
    {
    }

    public function before()
    {
        $this->begin = microtime(true);
    }

    public function after()
    {
        $this->end = microtime(true);
    }

    public function before_per_laps()
    {
        $this->begin_per_laps = microtime(true);
    }

    public function after_per_laps()
    {
        $this->laps[] = microtime() - $this->begin_per_laps;
    }

    public function elapsed()
    {
        return microtime(true) - $this->begin;
    }

    public function total()
    {
        return $this->end - $this->begin;
    }

    public function average()
    {
        return $this->total() / count($this->laps);
    }
}
