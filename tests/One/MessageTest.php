<?php

namespace Silverstreet\TestCase\One;

use Laravie\Codex\Testing\Faker;
use Mockery as m;
use PHPUnit\Framework\TestCase;
use Silverstreet\Client;

class MessageTest extends TestCase
{
    /**
     * Teardown the test environment.
     */
    protected function tearDown(): void
    {
        m::close();
    }

    /** @test */
    public function it_can_send_message()
    {
        $body = [
            'username' => 'foo',
            'password' => 'bar',
        ];

        $faker = Faker::create()
                    ->stream('POST', m::type('Array'))
                    ->expectEndpointIs('https://ic1.silverstreet.com/send.php')
                    ->shouldResponseWith(200, '1');

        $client = new Client($faker->http(), $body['username'], $body['password']);

        $response = $client->uses('Message')->text('Hello world', '+60123456789', 'KATSANA');

        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame('1', $response->getBody());
    }
}
