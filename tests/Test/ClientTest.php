<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry @ovr <talk@dmtry.me>
 */

namespace Test;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructSuccess()
    {
        $appId = 12345;
        $secret = 'mytestkey';

        $client = new SimpleClient($appId, $secret);
        static::assertInstanceOf('SocialConnect\Common\ClientAbstract', $client);
        static::assertSame($appId, $client->getAppId());
        static::assertSame($secret, $client->getAppSecret());
    }
}
