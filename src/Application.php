<?php

namespace siad007\kindergarten;

use Cilex\Application as Cilex;
use Symfony\Component\Stopwatch\Stopwatch;

class Application extends Cilex
{
    public static $VERSION = '0.0.0';

    public function __construct()
    {
        parent::__construct('kindergarten', self::$VERSION);

        $this['kernel.timer.start'] = time();
        $this['kernel.stopwatch'] = function () {
            return new Stopwatch();
        };
    }
}
