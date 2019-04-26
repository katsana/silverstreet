<?php

namespace Silverstreet\Tests\Laravel;

use Silverstreet\Laravel\SilverstreetServiceProvider;
use PHPUnit\Framework\TestCase;

class SilverstreetServiceProviderTest extends TestCase
{
    /** @test */
    public function it_should_be_deferred()
    {
        $this->assertTrue((new SilverstreetServiceProvider(null))->isDeferred());
    }

    /** @test */
    public function it_should_provids_expected_services()
    {
        $provides = [
            'silverstreet',
        ];

        $this->assertEquals($provides, (new SilverstreetServiceProvider(null))->provides());
    }
}
