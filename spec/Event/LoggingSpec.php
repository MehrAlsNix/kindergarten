<?php

namespace spec\MehrAlsNix\kindergarten\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LoggingSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('createInstance', []);
        $this->beAnInstanceOf('MehrAlsNix\kindergarten\Event\BaseEvent');
    }
}
