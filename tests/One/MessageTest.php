<?php

namespace Silverstreet\TestCase\One;

use Mockery as m;
use Silverstreet\Client;
use Silverstreet\One\Message;
use PHPUnit\Framework\TestCase;
use Laravie\Codex\Testing\Faker;

class MessageTest extends TestCase
{
    /**
     * Teardown the test environment.
     */
    protected function tearDown()
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
                    ->expectEndpointIs('https://api.silverstreet.com/send.php')
                    ->call('POST', m::type('Array'), m::type('GuzzleHttp\Psr7\Stream'))
                    ->shouldResponseWith(200, '1');

        $client = new Client($faker->http(), $body['username'], $body['password']);

        $response = $client->uses('Message')->text('Hello world', '+60123456789', 'KATSANA');

        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame('1', $response->getBody());
    }
}
