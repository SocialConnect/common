<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry @ovr <talk@dmtry.me>
 */

namespace SocialConnect\Common\Http;

class Response implements ResponseInterface
{
    const STATUS_OK = 200;

    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var string|boolean
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
     * @return string|boolean
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
     * @return bool
     */
    public function isOk()
    {
        return $this->statusCode == self::STATUS_OK;
    }

    /**
     * Is Server Error? (All 5xx Codes)
     *
     * @return bool
     */
    public function isServerError()
    {
        return $this->statusCode > 499 && $this->statusCode < 600;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
