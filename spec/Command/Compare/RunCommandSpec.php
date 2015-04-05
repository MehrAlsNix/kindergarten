<?php

namespace spec\MehrAlsNix\kindergarten\Command\Compare;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RunCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MehrAlsNix\kindergarten\Command\Compare\RunCommand');
    }
}
