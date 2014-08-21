<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry @ovr <talk@dmtry.me>
 */

namespace Test;

class SimpleClient extends \SocialConnect\Common\ClientAbstract {
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }
}