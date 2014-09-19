<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry @ovr <talk@dmtry.me>
 */

namespace SocialConnect\Common\Http;

class Response
{
    /**
     * @var string
     */
    protected $statusCode;

    /**
     * @var string|boolean|null
     */
    protected $body;

    /**
     * @param $statusCode
     * @param $body
     */
    public function __construct($statusCode, $body)
    {
        $this->statusCode = $statusCode;
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed|null
     */
    public function json()
    {
        if ($this->body) {
            return json_decode($this->body);
        }

        return null;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
