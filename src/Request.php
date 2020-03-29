<?php

namespace Silverstreet;

use Laravie\Codex\Contracts\Response as ResponseContract;
use Psr\Http\Message\ResponseInterface;

abstract class Request extends \Laravie\Codex\Request
{
    /**
     * Resolve the responder class.
     */
    protected function responseWith(ResponseInterface $response): ResponseContract
    {
        return new Response($response);
    }

    /**
     * Get API Body.
     */
    protected function getApiBody(): array
    {
        return [
            'username' => $this->client->getApiUsername(),
            'password' => $this->client->getApiPassword(),
        ];
    }
}
