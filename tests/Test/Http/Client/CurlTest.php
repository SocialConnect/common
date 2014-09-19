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
        $this->assertInstanceOf('SocialConnect\Common\Http\Client\Client', $client);

        $client = new Curl();
        $this->assertInstanceOf('SocialConnect\Common\Http\Client\Client', $client);
    }

    public function testRequest()
    {
        $client = new Curl();
        $client->request('http://phalcon-module.dmtry.me/api/users/get/1/');
    }
}
