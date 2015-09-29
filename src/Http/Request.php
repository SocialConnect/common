<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry @ovr <talk@dmtry.me>
 */

namespace SocialConnect\Common\Http;

use SocialConnect\Common\Http\Client\Client;

class Request
{
    /**
     * @var string
     */
    protected $uri;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * Request constructor.
     *
     * @param string $uri
     * @param array $parameters
     * @param string $method
     */
    public function __construct($uri, array $parameters = array(), $method = Client::GET)
    {
        $this->uri = $uri;
        $this->method = $method;
        $this->parameters = $parameters;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }
}
