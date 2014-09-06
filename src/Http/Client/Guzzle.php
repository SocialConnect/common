<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace SocialConnect\Common\Http\Client;

use \GuzzleHttp\Client;

class Guzzle extends Client
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client;
    }

    public function send($uri, $parameters = array(), $method = 'GET')
    {

    }
}
