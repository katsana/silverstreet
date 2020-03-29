<?php

namespace Silverstreet;

use Http\Client\Common\HttpMethodsClient as HttpClient;
use Laravie\Codex\Discovery;

class Client extends \Laravie\Codex\Client
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
     * Construct a new Silverstreet Client.
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
     * @return static
     */
    public static function make(string $apiUsername, string $apiPassword)
    {
        return new static(Discovery::client(), $apiUsername, $apiPassword);
    }

    /**
     * Get API username.
     */
    final public function getApiUsername(): string
    {
        return $this->apiUsername;
    }

    /**
     * Get API Password.
     */
    final public function getApiPassword(): string
    {
        return $this->apiPassword;
    }

    /**
     * Get resource default namespace.
     */
    protected function getResourceNamespace(): string
    {
        return __NAMESPACE__;
    }
}
