<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace SocialConnect\Common\Http\Client;

use InvalidArgumentException;
use SocialConnect\Common\Http\Client\Response\HeadersParser;
use SocialConnect\Common\Http\Response;
use SocialConnect\Common\Exception;
use RuntimeException;

class Curl extends Client
{
    /**
     * Curl resource
     *
     * @var resource
     */
    protected $client;

    protected $parameters = array(
        CURLOPT_USERAGENT => 'SocialConnect\Curl (https://github.com/socialconnect/common) v0.6',
        CURLOPT_HEADER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 0,
        CURLOPT_TIMEOUT => 30
    );

    /**
     * @param array|null $parameters
     */
    public function __construct(array $parameters = null)
    {
        if ($parameters) {
            $this->parameters = array_merge($this->parameters, $parameters);
        }

        if (!extension_loaded('curl')) {
            throw new RuntimeException('You need to install curl-ext for use SocialConnect-Http\Client\Curl.');
        }

        $this->client = curl_init();
    }

    /**
     * {@inheritdoc}
     */
    public function request($uri, array $parameters = array(), $method = Client::GET, array $headers = array(), array $options = array())
    {
        switch ($method) {
            case Client::POST:
                curl_setopt($this->client, CURLOPT_POST, true);
                break;
            case Client::GET:
                curl_setopt($this->client, CURLOPT_HTTPGET, true);
                break;
            case Client::DELETE:
            case Client::PATCH:
            case Client::OPTIONS:
            case Client::PUT:
            case Client::HEAD:
                curl_setopt($this->client, CURLOPT_CUSTOMREQUEST, $method);
                break;
            default:
                throw new InvalidArgumentException("Method {$method} is not supported");
        }

        switch ($method) {
            case Client::POST:
                if (count($parameters) > 0) {
                    $fields = [];
                    foreach ($parameters as $name => $value) {
                        $fields[] = urlencode($name) . '=' . urlencode($value);
                    }

                    curl_setopt($this->client, CURLOPT_POSTFIELDS, implode('&', $fields));
                    unset($fields);
                }
                break;
            default:
                if (count($parameters) > 0) {
                    foreach ($parameters as $key => $parameter) {
                        if (is_array($parameter)) {
                            $parameters[$key] = implode(',', $parameter);
                        }
                    }

                    if (strpos($uri, '?') === false) {
                        $uri .= '?';
                    } else {
                        $uri .= '&';
                    }

                    $uri .= http_build_query($parameters);
                }
                break;
        }

        /**
         * Prepare function for headers like this
         *
         * array('Authorization' => 'token fdsfds')
         */
        if (count($headers) > 0) {
            foreach ($headers as $key => $header) {
                if (!is_int($key)) {
                    $headers[$key] = $key . ': ' . $header;
                }
            }
        }

        /**
         * Setup default parameters
         */
        foreach ($this->parameters as $key => $value) {
            curl_setopt($this->client, $key, $value);
        }

        $headersParser = new HeadersParser();
        curl_setopt($this->client, CURLOPT_HEADERFUNCTION, array($headersParser, 'parseHeaders'));
        curl_setopt($this->client, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($this->client, CURLOPT_URL, $uri);

        $result = curl_exec($this->client);
        if ($result === false) {
            throw new Exception('Curl http Error');
        }

        $response = new Response(curl_getinfo($this->client, CURLINFO_HTTP_CODE), $result, $headersParser->getHeaders());

        if (version_compare(PHP_VERSION, '5.5.0') >= 0) {
            /**
             * Reset all options of a libcurl client after request
             */
            curl_reset($this->client);
        } else {
            unset($this->client);
            $this->client = curl_init();
        }

        return $response;
    }

    /**
     * @param $option
     * @param $value
     */
    public function setOption($option, $value)
    {
        curl_setopt($this->client, $option, $value);
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }
}
