<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry @ovr <talk@dmtry.me>
 */

namespace Test\Http\Client;

use SocialConnect\Common\Http\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructSuccess()
    {
        $this->assertSame(Response::STATUS_OK, 200);

        $response = new Response(Response::STATUS_OK, 'test string');
        $this->assertSame(Response::STATUS_OK, $response->getStatusCode());
        $this->assertSame('test string', $response->getBody());
        $this->assertTrue($response->isOk());
    }
}
