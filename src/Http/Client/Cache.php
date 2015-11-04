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

    /**
     * @param string $url
     * @param array $parameters
     * @return string
     */
    protected function makeCacheKey($url, array $parameters = array())
    {
        $key = $url;
        $key .= implode('&', $parameters);

        return $key;
    }

    public function request($url, array $parameters = array(), $method = Client::GET, array $headers = array(), array $options = array())
    {
        switch ($parameters) {
            case Client::GET:
                $key = $this->makeCacheKey($url, $parameters);
                if ($this->cache->contains($key)) {
                    return $this->cache->fetch($key);
                }
                break;
        }

        $result = $this->client->request($url, $parameters, $method, $headers, $options);
        return $result;
    }
}
