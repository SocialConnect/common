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
        $client = new SimpleClient(12345, "appsecret");
        $this->assertInstanceOf('SocialConnect\Common\ClientAbstract', $client);
    }
}
