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
    /**
     * Request specify url
     *
     * @param $url
     * @param array $parameters
     * @param string $method
     * @return \SocialConnect\Common\Http\Response
     */
    public function request($url, array $parameters = array(), $method = Client::GET);
}
