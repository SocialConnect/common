<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace SocialConnect\Common\Http\Client;

class Cache implements ClientInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var \Doctrine\Common\Cache\Cache
     */
    protected $cache;

    public function __construct(Client $client, \Doctrine\Common\Cache\Cache $cache)
    {
        $this->client = $client;
        $this->cache = $cache;
    }

    public function request($url, array $parameters = array(), $method = Client::GET, array $headers = array(), array $options = array())
    {
        $this->client->request($url, $parameters, $method, $headers, $options);
    }
}
