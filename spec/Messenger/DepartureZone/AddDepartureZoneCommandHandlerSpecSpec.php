<?php

namespace spec\App\Messenger\DepartureZone;

use App\Messenger\DepartureZone\AddDepartureZoneCommandHandlerSpec;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddDepartureZoneCommandHandlerSpecSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(AddDepartureZoneCommandHandlerSpec::class);
    }
}
