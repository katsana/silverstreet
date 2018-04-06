<?php

namespace Silverstreet\One;

use Silverstreet\Request;
use Laravie\Codex\Contracts\Response;
use Laravie\Codex\Concerns\Request\Multipart;

class Message extends Request
{
    use Multipart;

    /**
     * Send SMS.
     *
     * @param  string  $body
     * @param  string  $destination
     * @param  string  $sender
     * @param  array  $optional
     *
     * @return \Laravie\Codex\Contracts\Response
     */
    public function text(string $body, string $destination, string $sender, array $optional = []): Response
    {
        $payload = $this->mergeApiBody(
            array_merge(compact('body', 'destination', 'sender'), $optional)
        );

        return $this->stream(
            'POST', 'send.php', $this->getApiHeaders(), $payload, []
        );
    }
}
