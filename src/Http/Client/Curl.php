<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace SocialConnect\Common\Http\Client;

use \SocialConnect\Common\Http\Response;

class Curl extends Client
{
    /**
     * Curl resource
     *
     * @var resource
     */
    protected $client;

    public function __construct()
    {
        $this->client = curl_init();
    }

    /**
     * @param $url
     * @param array $parameters
     * @param string $method
     * @return Response
     */
    public function request($url, array $parameters = array(), $method = Client::GET)
    {
        switch ($method) {
            case Client::POST:
                curl_setopt($this->client, CURLOPT_POST, true);
                break;
            case Client::GET:
                curl_setopt($this->client, CURLOPT_HTTPGET, true);
                break;
        }

        curl_setopt($this->client, CURLOPT_URL, $url);
        curl_setopt($this->client, CURLOPT_HEADER, 0);


        if (!$result = curl_exec($this->client)) {
            throw new \Exception('Curl http Error');
        }

        return new Response(curl_getinfo($this->client, CURLINFO_HTTP_CODE), $result);
    }
}
