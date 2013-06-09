<?php
namespace Ackintosh;

class Benchy
{
    public static function run($callable, $times = 1)
    {
        $reporter = new Benchy\Reporter();
        $reporter->before();
        for ($i = 0; $i < $times; $i++) {
            $reporter->before_per_laps();
            $callable($reporter);
            $reporter->after_per_laps();
        }
        $reporter->after();
        return $reporter;
    }
}

