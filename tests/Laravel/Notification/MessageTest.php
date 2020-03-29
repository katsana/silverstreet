<?php

namespace Silverstreet\Tests\Laravel\Notification;

use PHPUnit\Framework\TestCase;
use Silverstreet\Laravel\Notification\Message;

class MessageTest extends TestCase
{
    /** @test */
    public function it_has_proper_signature()
    {
        $message = new Message('Hello world', 'KATSANA');

        $this->assertSame('Hello world', $message->text());
        $this->assertSame('KATSANA', $message->sender());
    }
}
