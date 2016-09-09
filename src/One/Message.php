<?php

namespace Silverstreet\One;

use Silverstreet\Request;
use Laravie\Codex\Support\MultipartRequest;

class Message extends Request
{
    use MultipartRequest;

    /**
     * Send SMS.
     *
     * @param  string  $body
     * @param  string  $destination
     * @param  string  $sender
     * @param  array  $optional
     *
     * @return \Laravie\Codex\Response
     */
    public function text($body, $destination, $sender, array $optional = [])
    {
        $body = array_merge(compact('body', 'destination', 'sender'), $optional);

        list($headers, $stream) = $this->prepareMultipartRequestPayloads([], $this->addApiCredentials($body), []);

        return $this->send('POST', 'send.php', $headers, $stream);
    }
}
