<?php

namespace Silverstreet;

use Laravie\Codex\Request as BaseRequest;

abstract class Request extends BaseRequest
{
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
