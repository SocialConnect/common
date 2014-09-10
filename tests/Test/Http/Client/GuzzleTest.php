<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry @ovr <talk@dmtry.me>
 */

namespace Test\Http\Client;

use SocialConnect\Common\Http\Client\Guzzle;
use GuzzleHttp\Client;

class GuzzleTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructSuccess()
    {
        $client = new Guzzle();
        $this->assertInstanceOf('SocialConnect\Common\Http\Client\Client', $client);

        $client = new Guzzle(new Client());
        $this->assertInstanceOf('SocialConnect\Common\Http\Client\Client', $client);
    }

    public function testRequest()
    {
        $client = new Guzzle(new Client());
        $client->request('http://phalcon-module.dmtry.me/api/users/get/1/');
    }
}
