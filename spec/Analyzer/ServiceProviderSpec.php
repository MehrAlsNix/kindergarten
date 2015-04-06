<?php

namespace spec\MehrAlsNix\kindergarten\Analyzer;

use Cilex\Application;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ServiceProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MehrAlsNix\kindergarten\Analyzer\ServiceProvider');
    }

    function it_should_be_a_service_provider(Application $app)
    {
        $this->shouldImplement('Cilex\ServiceProviderInterface');
        $this->register($app)->shouldReturn(null);
    }
}
