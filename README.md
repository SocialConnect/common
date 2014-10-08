SocialConnect Common
====================

## Http\Client

You can use `Curl` client

```php
  $httpClient = new SocialConnect\Common\Http\Client\Curl();
```

or `Guzzle` wrapper for GuzzleHttp library

```php
  $httpClient = new SocialConnect\Common\Http\Client\Guzzle();
```

## Build `Client` for your REST API application

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
    
  }
}
```

Next you can use it

```
$client = new MySocialNetworkClient($appId, $appSecret);
$client->setHttpClient(new SocialConnect\Common\Http\Client\Curl());

//Custom rest methods
$client->requestMethod('myTestMethod', []);
$client->requestMethod('myTest', []);
```
