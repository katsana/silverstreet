<?php

namespace Silverstreet\One;

use Silverstreet\Request;

class Message extends Request
{
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

        return $this->send('POST', 'send.php', [], $body);
    }
}
