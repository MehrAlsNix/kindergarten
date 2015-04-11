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

    function it_is_aware_of_messages(Debugging $event)
    {
        $this->beConstructedWith($event);
        $this->setMessage('test')
            ->shouldReturnAnInstanceOf('MehrAlsNix\kindergarten\Event\Debugging');
        $this->getMessage()->shouldBe('test');
    }

    function it_is_aware_of_priorities(Debugging $event)
    {
        $this->beConstructedWith($event);
        $this->getPriority()->shouldBe('debug');
    }

    function it_is_aware_of_a_context(Debugging $event)
    {
        $this->beConstructedWith($event);
        $this->setContext(['test'])
            ->shouldReturnAnInstanceOf('MehrAlsNix\kindergarten\Event\Debugging');
        $this->getContext()->shouldBe(['test']);
    }
}
