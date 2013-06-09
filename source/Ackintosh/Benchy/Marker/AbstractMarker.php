<?php
namespace Ackintosh\Benchy\Marker;

abstract class AbstractMarker
{
    public function before() {}
    public function after() {}
    public function before_per_laps() {}
    public function after_per_laps() {}
}
