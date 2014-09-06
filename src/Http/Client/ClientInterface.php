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
    public function makeRequest($url, array $parameters = array(), $method = 'GET');
} 