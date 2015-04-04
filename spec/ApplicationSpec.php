<?php

namespace spec\MehrAlsNix\kindergarten;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MehrAlsNix\kindergarten\Application');
    }

    function it_should_be_a_cilex_application()
    {
        $this->shouldBeAnInstanceOf('Cilex\Application');
    }

    function it_is_runnable()
    {
        $this->run();
    }
}
