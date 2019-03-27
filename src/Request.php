<?php

namespace Silverstreet;

use Laravie\Codex\Contracts\Response as ResponseContract;
use Psr\Http\Message\ResponseInterface;

abstract class Request extends \Laravie\Codex\Request
{
    /**
     * Resolve the responder class.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return \Laravie\Codex\Contracts\Response
     */
    protected function responseWith(ResponseInterface $response): ResponseContract
    {
        return new Response($response);
    }

    /**
     * Get API Body.
     *
     * @return array
     */
    protected function getApiBody(): array
    {
        return [
            'username' => $this->client->getApiUsername(),
            'password' => $this->client->getApiPassword(),
        ];
    }
}
