<?php

namespace spec\MehrAlsNix\kindergarten\Comparator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ComparatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MehrAlsNix\kindergarten\Comparator\Comparator');
    }
}
