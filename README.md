#Benchy
`Benchy` is simple and pluggable benchmark tool.

The build status of the current master branch is tracked by Travis CI:
[![Build Status](https://travis-ci.org/ackintosh/benchy.png?branch=master)](https://travis-ci.org/ackintosh/benchy)

##Installation
`composer.json`

```
{
    "require": {
        "ackintosh/benchy": "dev-master"
    }
}
```

```
$ php composer.phar install
```

##Usage

```php
<?php
require_once 'vendor/autoload.php';

$reporter = Ackintosh\Benchy::run(function ($reporter) {

    // do something

    echo $reporter->time->elapsed() . PHP_EOL;

    // do something

    echo $reporter->time->elapsed() . PHP_EOL;

}, 1000); // runs 1,000 times.(default : 1 )

echo 'total : ' . $reporter->time->total() . PHP_EOL;
echo 'average : ' . $reporter->time->average() . PHP_EOL;
```

##Extending Benchy
Create your sexy code in `Ackintosh/Bechy/Marker` directory.


`Ackintosh/Benchy/Marker/Example.php`

```php
<?php
class Example extends AbstractMarker{
    public function hoge() {}
}
```

```php
<?php
$reporter->example->hoge();
```

##Hook points
- before
- after
- before_per_laps
- after_per_laps

```php
<?php
class Example extends AbstractMarker{
    // override
    public function before()
    {
        // runs before benchmarking
    }
}
```
