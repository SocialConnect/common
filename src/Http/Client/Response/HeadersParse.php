<?php
/**
 * Created by PhpStorm.
 * User: ovr
 * Date: 26.09.15
 * Time: 18:28
 */

namespace SocialConnect\Common\Http\Client\Response;


class HeadersParse
{
    protected $headers = array();

    /**
     * @param resource $client
     * @param string $headerLine
     * @return int
     */
    public function parseHeaders($client, $headerLine)
    {
        $this->headers[] = $headerLine;
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