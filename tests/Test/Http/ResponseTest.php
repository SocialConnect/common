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
        static::assertSame(Response::STATUS_OK, 200);

        $response = new Response(Response::STATUS_OK, 'test string', array());
        static::assertSame(Response::STATUS_OK, $response->getStatusCode());
        static::assertSame('test string', $response->getBody());
        static::assertTrue($response->isOk());
    }

    public function testHeadersMethods()
    {
        $value = '123fdsf23423';

        $response = new Response(Response::STATUS_OK, 'test string', array('X-AUTH-TOKEN' => $value));
        static::assertFalse($response->hasHeader('X-AUTH'));
        static::assertTrue($response->hasHeader('X-AUTH-TOKEN'));
        static::assertSame($value, $response->getHeader('X-AUTH-TOKEN'));
    }
}
