<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace SocialConnect\Common\Http\Client;

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

    public function __construct()
    {
        if (!extension_loaded('curl')) {
            throw new RuntimeException('You need to install curl-ext for use SocialConnect-Http\Client\Curl.');
        }

        $this->client = curl_init();
    }

    /**
     * {@inheritdoc}
     */
    public function request($url, array $parameters = array(), $method = Client::GET, array $headers = array(), array $options = array())
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
                throw new \InvalidArgumentException('Method {$method} is not supported');
                break;
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

                    if (strpos($url, '?') === false) {
                        $url .= '?';
                    } else {
                        $url .= '&';
                    }

                    $url .= http_build_query($parameters);
                }
                break;
        }

        curl_setopt($this->client, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($this->client, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->client, CURLOPT_URL, $url);
        curl_setopt($this->client, CURLOPT_HEADER, 0);
        curl_setopt($this->client, CURLOPT_USERAGENT, 'SocialConnect-Http-Client-Curl' . curl_version()['version']);

        $result = curl_exec($this->client);
        if ($result === false) {
            throw new Exception('Curl http Error');
        }

        $response = new Response(curl_getinfo($this->client, CURLINFO_HTTP_CODE), $result);

        // if (version_compare(PHP_VERSION, '5.5.0') >= 0) {
        //     /**
        //      * Reset all options of a libcurl client after request
        //      */
        //     curl_reset($this->client);
        // } else {
        //     unset($this->client);
        //     $this->client = curl_init();
        // }

        return $response;
    }

    public function setOption($option, $value)
    {
        curl_setopt($this->client, $option, $value);
    }
}
