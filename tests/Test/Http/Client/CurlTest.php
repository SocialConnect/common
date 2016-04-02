<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry @ovr <talk@dmtry.me>
 */

namespace Test\Http\Client;

use SocialConnect\Common\Http\Client\Curl;

class CurlTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructSuccess()
    {
        $client = new Curl();
        static::assertInstanceOf('SocialConnect\Common\Http\Client\Client', $client);
    }

    public function testRequest()
    {
        $client = new Curl();
        $response = $client->request('https://api.dmtry.me/api/users/get/1/');

        static::assertInstanceOf('SocialConnect\Common\Http\Response', $response);
        static::assertTrue($response->isOk());
        static::assertInternalType('string', $response->getBody());
        static::assertInternalType('integer', $response->getStatusCode());
        static::assertInternalType('object', $response->json());
        static::assertInternalType('array', $response->json(true));
        static::assertInternalType('array', $response->getHeaders());

        /**
         * Test after request
         */
        static::assertInternalType('resource', $client->getCurlHandler());
    }

    public function testGetCurlHandler()
    {
        $client = new Curl();
        static::assertInternalType('resource', $client->getCurlHandler());
    }
}
