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
        $this->shouldHaveType('MehrAlsNix\kindergarten\Event\Logging');
        $this->shouldBeAnInstanceOf('MehrAlsNix\kindergarten\Event\Debugging');
        $this->getSubject()->shouldHaveType('MehrAlsNix\kindergarten\Event\Logging');
    }

    function it_is_aware_of_priorities(Logging $event)
    {
        $this->beConstructedWith($event);
        $this->setPriority('info');
        $this->getPriority()->shouldBe('info');
    }
}
