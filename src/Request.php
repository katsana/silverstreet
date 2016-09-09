<?php
namespace Silverstreet;

use GuzzleHttp\Psr7\Uri;
use Laravie\Codex\Request as BaseRequest;

abstract class Request extends BaseRequest
{
    /**
     * Add API Credentials.
     *
     * @param  array  $body
     *
     * @return array
     */
    protected function addApiCredentials(array $body)
    {
        $body['username'] = $this->client->getApiUsername();
        $body['password'] = $this->client->getApiPassword();

        return $body;
    }

    /**
     * Get URI Endpoint.
     *
     * @param  string  $endpoint
     *
     * @return \GuzzleHttp\Psr7\Uri
     */
    protected function getUriEndpoint($endpoint)
    {
        $to = sprintf('%s/%s', $this->client->getApiEndpoint(), $endpoint);

        return new Uri($to);
    }
}
