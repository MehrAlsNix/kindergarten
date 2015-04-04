<?php
/**
 * Created by PhpStorm.
 * User: said
 * Date: 05.04.2015
 * Time: 01:12
 */

namespace spec\MehrAlsNix\kindergarten\Console\Output;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OutputSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MehrAlsNix\kindergarten\Console\Output\Output');
    }

    function it_should_be_a_console_output()
    {
        $this->shouldBeAnInstanceOf('Symfony\Component\Console\Output\ConsoleOutput');
    }
}
