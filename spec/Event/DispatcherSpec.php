<?php

namespace spec\MehrAlsNix\kindergarten\Event;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DispatcherSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MehrAlsNix\kindergarten\Event\Dispatcher');
        $this->beConstructedWith('MehrAlsNix\kindergarten\Event\Dispatcher');
        $this->beConstructedThrough('getInstance', []);
    }

    function it_is_a_child_of_eventdispatcher()
    {
        $this->beConstructedThrough('getInstance', []);
        $this->beAnInstanceOf('\Symfony\Component\EventDispatcher\EventDispatcher');
    }
}
