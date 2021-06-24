<?php

namespace Silverstreet\TestCase;

use Laravie\Codex\Client as Codex;
use Mockery as m;
use PHPUnit\Framework\TestCase;
use Silverstreet\Client;

class ClientTest extends TestCase
{
    /**
     * Teardown the test environment.
     */
    protected function tearDown(): void
    {
        m::close();
    }

    /** @test */
    public function it_can_make_a_client()
    {
        $client = Client::make('foo', 'bar');

        $this->assertInstanceOf(Client::class, $client);
        $this->assertInstanceOf(Codex::class, $client);

        $this->assertEquals('foo', $client->getApiUsername());
        $this->assertEquals('bar', $client->getApiPassword());
        $this->assertEquals('https://ic1.silverstreet.com', $client->getApiEndpoint());
        $this->assertEquals('v1', $client->getApiVersion());
    }
}
