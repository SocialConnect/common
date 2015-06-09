SocialConnect Common
====================
[![Build Status](http://img.shields.io/travis/SocialConnect/common.svg?style=flat)](https://travis-ci.org/SocialConnect/common)
[![Code Coverage](http://img.shields.io/coveralls/SocialConnect/common.svg?style=flat)](https://coveralls.io/r/SocialConnect/common)
[![License](http://img.shields.io/packagist/l/SocialConnect/common.svg?style=flat)](https://packagist.org/packages/socialconnect/common)

## Enitity

+ User
+ Friend

You can intance and setup fields for entity

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
