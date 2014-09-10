<?php
/**
 * Created by PhpStorm.
 * User: ovr
 * Date: 9/6/14
 * Time: 3:40 PM
 */

namespace SocialConnect\Common\Http\Client;


interface ClientInterface
{
    public function request($url, array $parameters = array(), $method = Client::GET);
}
