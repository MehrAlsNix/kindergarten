<?php

namespace spec\MehrAlsNix\kindergarten\Event;

use MehrAlsNix\kindergarten\Event\Debugging;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DebuggingSpec extends ObjectBehavior
{
    function it_is_initializable(Debugging $event)
    {
        $this->beConstructedWith($event);
        $this->shouldHaveType('MehrAlsNix\kindergarten\Event\Debugging');
    }
}
