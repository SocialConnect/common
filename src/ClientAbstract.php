<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry @ovr <talk@dmtry.me>
 */

namespace SocialConnect\Common;

/**
 * Class ClientAbstract
 * @package SocialConnect\Common
 */
abstract class ClientAbstract
{
    /**
     * Application secret
     *
     * @var string|integer
     */
    protected $appId;

    /**
     * Application secret
     *
     * @var string
     */
    protected $appSecret;

    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @param string|integer $appId
     * @param string $appSecret
     * @param null $accessToken
     */
    public function __construct($appId, $appSecret, $accessToken = null)
    {
        $this->appId = $appId;
        $this->appSecret = $appSecret;

        if ($accessToken) {
            $this->setAccessToken($accessToken);
        }
    }

    /**
     * @return string
     */
    public function getAppSecret()
    {
        return $this->appSecret;
    }

    /**
     * @return int|string
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    abstract public function setAccessToken($accessToken);
}
