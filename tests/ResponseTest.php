<?php

namespace Silverstreet\TestCase;

use Mockery as m;
use Silverstreet\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    /**
     * Teardown the test environment.
     */
    protected function tearDown()
    {
        m::close();
    }

    /**
     * @test
     * @expectedException \DomainException
     * @expectedExceptionMessage Unable to convert response to array!
     */
    public function it_cant_be_converted_to_array()
    {
        $message = m::mock('Psr\Http\Message\ResponseInterface');

        $message->shouldReceive('getStatusCode')->andReturn(200);
        $message->shouldReceive('getBody')->andReturn('01');

        (new Response($message))->toArray();
    }
}
