<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace SocialConnect\Common\Http\Client;

use \GuzzleHttp\Client as GuzzleClient;

class Guzzle extends Client
{
    /**
     * @var GuzzleClient
     */
    protected $client;

    /**
     * @param GuzzleClient $client
     */
    public function __construct(GuzzleClient $client = null)
    {
        $this->client = $client;
    }

    public function makeRequest($url, array $parameters = array(), $method = Client::GET)
    {
        $request = $this->client->createRequest($method, $url, $parameters);
    }
}
