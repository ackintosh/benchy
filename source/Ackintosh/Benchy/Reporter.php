<?php
namespace Ackintosh\Benchy;

class Reporter
{
    private $observers = array();

    public function __construct()
    {
        $dir = new \DirectoryIterator(__DIR__ . '/Marker');
        foreach ($dir as $d) {
            if (!$d->isFile()) continue;
            list($name) = explode('.', $d->getFilename());
            require_once __DIR__ . "/Marker/{$name}.php";

            // interface
            if (preg_match('/.*Interface\.php$/', $d->getFilename())) continue;
            // abstract class
            if (preg_match('/^Abstract.*\.php$/', $d->getFilename())) continue;

            $obj_index = strtolower($name);
            $obj_name = "Ackintosh\Benchy\Marker\\{$name}";
            $this->observers[$obj_index] = new $obj_name;
        }
    }

    public function __get($name)
    {
        if (isset($this->$name)) return $this->$name;
        return $this->observers[$name];
    }

    public function before_per_laps()
    {
        foreach ($this->observers as $o) $o->before_per_laps();
    }

    public function after_per_laps()
    {
        foreach ($this->observers as $o) $o->after_per_laps();
    }

    public function before()
    {
        foreach ($this->observers as $o) $o->before();
    }

    public function after()
    {
        foreach ($this->observers as $o) $o->after();
    }
}

