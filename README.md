Silverstreet API Client for PHP
==============

[![Latest Stable Version](https://poser.pugx.org/katsana/silverstreet/v/stable)](https://packagist.org/packages/katsana/silverstreet)
[![Total Downloads](https://poser.pugx.org/katsana/silverstreet/downloads)](https://packagist.org/packages/katsana/silverstreet)
[![Latest Unstable Version](https://poser.pugx.org/katsana/silverstreet/v/unstable)](https://packagist.org/packages/katsana/silverstreet)
[![License](https://poser.pugx.org/katsana/silverstreet/license)](https://packagist.org/packages/katsana/silverstreet)


* [Installation](#installation)


## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
    "require": {
        "katsana/silverstreet": "~0.1",
        "php-http/guzzle6-adapter": "^1.1"
    }
}
```

### HTTP Adapter

Instead of utilizing `php-http/guzzle6-adapter` you might want to use any other adapter that implements `php-http/client-implementation`. Check [Clients & Adapters](http://docs.php-http.org/en/latest/clients.html) for PHP-HTTP.
