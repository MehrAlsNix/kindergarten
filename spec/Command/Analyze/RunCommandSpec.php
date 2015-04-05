<?php

namespace spec\MehrAlsNix\kindergarten\Command\Analyze;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RunCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MehrAlsNix\kindergarten\Command\Analyze\RunCommand');
    }
}
