<?php

namespace spec\MehrAlsNix\kindergarten\Collector;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ServiceProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MehrAlsNix\kindergarten\Collector\ServiceProvider');
    }

    function it_should_be_a_service_provider()
    {
        $this->shouldImplement('Cilex\ServiceProviderInterface');
    }
}
