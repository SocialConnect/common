SocialConnect Common
====================
[![Build Status](http://img.shields.io/travis/SocialConnect/common.svg?style=flat)](https://travis-ci.org/SocialConnect/common)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/SocialConnect/common/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/SocialConnect/common/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/SocialConnect/common/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/SocialConnect/common/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/55d04f643554d8000d000170/badge.svg?style=flat)](https://www.versioneye.com/user/projects/55d04f643554d8000d000170)
[![License](http://img.shields.io/packagist/l/SocialConnect/common.svg?style=flat-square)](https://packagist.org/packages/socialconnect/common)

## Entity

+ User
+ Friend

You can instance and setup fields for entity

```php
$user = new \SocialConnect\Common\Entity\User();
$user->id = 12345;
$user->firstname = 'Dmitry';
$user->lastname = 'Patsura';

var_dump($user);
```

## Http\Client

You can use `Curl` client

```php
$httpClient = new SocialConnect\Common\Http\Client\Curl();
```

or `Guzzle` wrapper for GuzzleHttp library

```php
$httpClient = new SocialConnect\Common\Http\Client\Guzzle();
```

## Build `Client` for your REST application

```php
use SocialConnect\Common\ClientAbstract;

class MySocialNetworkClient extends ClientAbstract
{
  public function requestMethod($method, $parameters)
  {
    //...
  }
  
  public function getUser($id)
  {
    $result = $this->requestMethod('/user/get/', $id);
    if ($result) {
      $user = new User();
      $user->id = $result->id;
      //...
      
      return $user;
    }
    
    return false;
  }
}
```

Next you can use it

```php
$client = new MySocialNetworkClient($appId, $appSecret);
$client->setHttpClient(new SocialConnect\Common\Http\Client\Curl());

$user = $client->getUser(1);

//Custom rest methods
$client->requestMethod('myTestMethod', []);
$client->requestMethod('myTest', []);
```

License
-------

This project is open-sourced software licensed under the MIT License.

See the LICENSE file for more information.
