<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
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
