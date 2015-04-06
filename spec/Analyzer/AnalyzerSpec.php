<?php

namespace spec\MehrAlsNix\kindergarten\Analyzer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AnalyzerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MehrAlsNix\kindergarten\Analyzer\Analyzer');
    }
}
