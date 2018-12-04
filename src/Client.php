<?php

namespace Silverstreet;

use Http\Client\Common\HttpMethodsClient as HttpClient;
use Laravie\Codex\Client as BaseClient;
use Laravie\Codex\Discovery;

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
     * Construct a new Silverstreet Client.
     *
     * @param \Http\Client\Common\HttpMethodsClient $http
     * @param string                                $apiUsername
     * @param string                                $apiPassword
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
     * @param string $apiUsername
     * @param string $apiPassword
     *
     * @return static
     */
    public static function make(string $apiUsername, string $apiPassword)
    {
        return new static(Discovery::client(), $apiUsername, $apiPassword);
    }

    /**
     * Get API username.
     *
     * @return string
     */
    final public function getApiUsername(): string
    {
        return $this->apiUsername;
    }

    /**
     * Get API Password.
     *
     * @return string
     */
    final public function getApiPassword(): string
    {
        return $this->apiPassword;
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
