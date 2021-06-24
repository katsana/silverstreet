<?php

namespace Silverstreet\TestCase\One;

use Laravie\Codex\Testing\Faker;
use Mockery as m;
use PHPUnit\Framework\TestCase;
use Silverstreet\Client;

class BalanceTest extends TestCase
{
    /**
     * Teardown the test environment.
     */
    protected function tearDown(): void
    {
        m::close();
    }

    /** @test */
    public function it_can_check_available_balance()
    {
        $body = [
            'username' => 'foo',
            'password' => 'bar',
        ];

        $faker = Faker::create()
                    ->send('POST', [], 'username=foo&password=bar')
                    ->expectEndpointIs('https://ic1.silverstreet.com/creditcheck.php')
                    ->shouldResponseWith(200, '<?xml version="1.0" encoding="ISO-8859-1"?>
<?xml-stylesheet type="text/xsl" href="creditcheck.xsl"?>
<credits>
    <balance>1437</balance>
</credits>');

        $client = new Client($faker->http(), $body['username'], $body['password']);

        $response = $client->uses('Credit')->available();

        $this->assertSame(1437, $response);
    }
}
