<?php

namespace spec\MehrAlsNix\kindergarten\Callables\Adapter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MethodsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MehrAlsNix\kindergarten\Callables\Adapter\Methods');
    }
}
