<?php

namespace Silverstreet\Laravel\Notification;

class Message
{
    /**
     * Text message.
     *
     * @var string
     */
    protected $text;

    /**
     * Sender information.
     *
     * @var string|null
     */
    protected $sender;

    /**
     * Construct a new Message.
     */
    public function __construct(string $text, ?string $sender = null)
    {
        $this->text = $text;
        $this->sender = $sender;
    }

    /**
     * Get text message.
     */
    public function text(): string
    {
        return $this->text;
    }

    /**
     * Get sender.
     */
    public function sender(): ?string
    {
        return $this->sender;
    }
}
