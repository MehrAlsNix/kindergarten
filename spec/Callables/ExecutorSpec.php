<?php

namespace spec\MehrAlsNix\kindergarten\Callables;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExecutorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MehrAlsNix\kindergarten\Callables\Executor');
    }

    function it_is_iteration_count_aware()
    {
        $this->setIterations(1);
        $this->getIterations()->shouldEqual(1);
    }
}
