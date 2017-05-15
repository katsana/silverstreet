<?php

namespace Silverstreet\TestCase;

use Mockery as m;
use Silverstreet\Client;
use PHPUnit\Framework\TestCase;
use Laravie\Codex\Client as Codex;

class ClientTest extends TestCase
{
    protected function tearDown()
    {
        m::close();
    }

    /** @test */
    public function make_a_client()
    {
        $client = Client::make('foo', 'bar');

        $this->assertInstanceOf(Client::class, $client);
        $this->assertInstanceOf(Codex::class, $client);

        $this->assertEquals('foo', $client->getApiUsername());
        $this->assertEquals('bar', $client->getApiPassword());
        $this->assertEquals('https://api.silverstreet.com', $client->getApiEndpoint());
        $this->assertEquals('v1', $client->getApiVersion());
    }
}
