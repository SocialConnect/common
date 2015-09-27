<?php
/**
 * Created by PhpStorm.
 * User: ovr
 * Date: 26.09.15
 * Time: 18:28
 */

namespace SocialConnect\Common\Http\Client\Response;


class HeadersParser
{
    protected $headers = array();

    /**
     * @param resource $client
     * @param string $headerLine
     * @return int
     */
    public function parseHeaders($client, $headerLine)
    {
        $parts = explode(':', $headerLine, 2);
        if (count($parts) == 2) {
            list ($name, $value) = $parts;
            $this->headers[trim($name)] = trim($value);
        }

        return strlen($headerLine);
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}