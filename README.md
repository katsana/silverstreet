Silverstreet API Client for PHP
==============

[![tests](https://github.com/katsana/silverstreet/workflows/tests/badge.svg?branch=master)](https://github.com/katsana/silverstreet/actions?query=branch%3Amaster+workflow%3Atests)
[![Latest Stable Version](https://poser.pugx.org/katsana/silverstreet/v/stable)](https://packagist.org/packages/katsana/silverstreet)
[![Total Downloads](https://poser.pugx.org/katsana/silverstreet/downloads)](https://packagist.org/packages/katsana/silverstreet)
[![Latest Unstable Version](https://poser.pugx.org/katsana/silverstreet/v/unstable)](https://packagist.org/packages/katsana/silverstreet)
[![License](https://poser.pugx.org/katsana/silverstreet/license)](https://packagist.org/packages/katsana/silverstreet)

* [Installation](#installation)
* [Usages](#usages)
  - [Creating Silverstreet Client](#creating-silverstreet-client)
  - [Sending SMS](#sending-sms)
  - [Checking Credit Balance](#checking-credit-balance)

## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
    "require": {
        "katsana/silverstreet": "^3.0",
        "php-http/guzzle6-adapter": "^2.0"
    }
}
```

### HTTP Adapter

Instead of utilizing `php-http/guzzle6-adapter` you might want to use any other adapter that implements `php-http/client-implementation`. Check [Clients & Adapters](http://docs.php-http.org/en/latest/clients.html) for PHP-HTTP.

## Usages

### Creating Silverstreet Client

You can start by creating a client by using the following code (which uses `php-http/guzzle6-adapter`):

```php
<?php

use Silverstreet\Client;

$http = Laravie\Codex\Discovery::client();


$silverstreet = new Client($http, 'your-api-username', 'your-api-password');
```

You could also use `php-http/discovery` to automatically pick available adapter installed via composer:

```php
<?php

use Silverstreet\Client;

$silverstreet = Client::make('your-api-username', 'your-api-password');
```

<a name="sending-text-messages"></a>
### Sending Text Messages

You can send text messages by running the following code.

```php
$silverstreet->uses('Message')
    ->text('Hello world', '+60123456789', $sender);
```

### Checking Credit Balance

You can request for available balance by running the following code.

```php
$balance = $silverstreet->uses('Credit')->available();

echo $balance; // 400
```
