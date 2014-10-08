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

## Build your neede `Client` for Rest Api

```php
use SocialConnect\Common\ClientAbstract;

class MySocialNetworkClient extends ClientAbstract
{

}
```

Next you can use it

```
```
