<?php

namespace Silverstreet;

use Laravie\Codex\Discovery;
use Laravie\Codex\Client as BaseClient;
use Psr\Http\Message\ResponseInterface;
use Http\Client\Common\HttpMethodsClient as HttpClient;
use Laravie\Codex\Contracts\Response as ResponseContract;

class Client extends BaseClient
{
    /**
     * The API endpoint.
     *
     * @var string
     */
    protected $apiEndpoint = 'https://api.silverstreet.com';

    /**
     * The API username.
     *
     * @var string
     */
    protected $apiUsername;

    /**
     * The API password.
     *
     * @var string
     */
    protected $apiPassword;

    /**
     * List of supported API versions.
     *
     * @var array
     */
    protected $supportedVersions = [
        'v1' => 'One',
    ];

    /**
     * Construct a new Billplz Client.
     *
     * @param \Http\Client\Common\HttpMethodsClient  $http
     * @param string  $apiUsername
     * @param string  $apiPassword
     */
    public function __construct(HttpClient $http, string $apiUsername, string $apiPassword)
    {
        $this->http = $http;
        $this->apiUsername = $apiUsername;
        $this->apiPassword = $apiPassword;
    }

    /**
     * Make a client.
     *
     * @param string  $apiUsername
     * @param string  $apiPassword
     *
     * @return $this
     */
    public static function make(string $apiUsername, string $apiPassword)
    {
        return new static(Discovery::client(), $apiUsername, $apiPassword);
    }

    /**
     * Get API username.
     *
     * @return string|null
     */
    public function getApiUsername(): ?string
    {
        return $this->apiUsername;
    }

    /**
     * Get API Password.
     *
     * @return string|null
     */
    public function getApiPassword(): ?string
    {
        return $this->apiPassword;
    }

    /**
     * Resolve the responder class.
     *
     * @param  \Psr\Http\Message\ResponseInterface  $response
     *
     * @return \Laravie\Codex\Contracts\Response
     */
    protected function responseWith(ResponseInterface $response): ResponseContract
    {
        return new Response($response);
    }

    /**
     * Get resource default namespace.
     *
     * @return string
     */
    protected function getResourceNamespace(): string
    {
        return __NAMESPACE__;
    }
}
