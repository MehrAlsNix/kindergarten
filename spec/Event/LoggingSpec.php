<?php

namespace spec\MehrAlsNix\kindergarten\Event;

use MehrAlsNix\kindergarten\Event\Logging;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LoggingSpec extends ObjectBehavior
{
    function it_is_initializable(Logging $event)
    {
        $this->beConstructedThrough('createInstance', [$event]);
        $this->beAnInstanceOf('MehrAlsNix\kindergarten\Event\BaseEvent');
    }
}
