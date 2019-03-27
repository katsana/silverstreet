<?php

namespace Silverstreet\TestCase;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Silverstreet\Response;

class ResponseTest extends TestCase
{
    /**
     * Teardown the test environment.
     */
    protected function tearDown(): void
    {
        m::close();
    }

    /** @test */
    public function it_cant_be_converted_to_array()
    {
        $this->expectException('DomainException');
        $this->expectExceptionMessage('Unable to convert response to array!');

        $message = m::mock(ResponseInterface::class);

        $message->shouldReceive('getStatusCode')->andReturn(200);
        $message->shouldReceive('getBody')->andReturn('01');

        (new Response($message))->toArray();
    }
}
