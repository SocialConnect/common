<?php
/**
 * Created by PhpStorm.
 * User: ovr
 * Date: 07.09.14
 * Time: 14:58
 */

namespace SocialConnect\Common;

/**
 * Class HttpClient
 * @package SocialConnect\Common
 */
trait HttpClient
{
    /**
     * @var Http\Client\ClientInterface
     */
    protected $httpClient;

    public function setHttpClient(Http\Client\ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return Http\Client\ClientInterface
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }
} 