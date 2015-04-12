<?php

namespace spec\MehrAlsNix\kindergarten\Collector;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MehrAlsNix\kindergarten\Collector\Collector');
    }

    function it_should_aware_of_adapter_type()
    {
        $this->setType('phparray');
        $this->getType()->shouldBeEqualTo('phparray');
    }
}
