<?php
namespace Silverstreet;

use GuzzleHttp\Psr7\Uri;
use Laravie\Codex\Request as BaseRequest;

abstract class Request extends BaseRequest
{
    /**
     * Send API request.
     *
     * @param  string  $method
     * @param  string  $path
     * @param  array  $headers
     * @param  \Psr\Http\Message\StreamInterface|array|null  $body
     *
     * @return \Laravie\Codex\Reponse
     */
    protected function send($method, $path, array $headers = [], $body = [])
    {
        $body['username'] = $this->client->getApiUsername();
        $body['password'] = $this->client->getApiPassword();

        return parent::send($method, $path, $headers, $body);
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
