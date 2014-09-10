<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace SocialConnect\Common\Http\Client;

use \GuzzleHttp\Client as GuzzleClient;
use \SocialConnect\Common\Http\Response;

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
        $this->client = is_null($client) ? new GuzzleClient() : $client;
    }

    public function request($url, array $parameters = array(), $method = Client::GET)
    {
        $response = $this->client->send($this->client->createRequest($method, $url, $parameters));

        return new Response($response->getStatusCode(), (string) $response->getBody());
    }
}
