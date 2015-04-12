<?php

namespace spec\MehrAlsNix\kindergarten\Callables;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CallablesSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MehrAlsNix\kindergarten\Callables\Callables');
    }

    function it_is_executable()
    {
        $this->execute()->shouldReturn(null);
    }
}
