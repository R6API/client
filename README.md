# R6API/Client

[![Latest Stable Version](https://poser.pugx.org/r6api/client/v/stable)](https://packagist.org/packages/r6api/client)
[![Maintainability](https://api.codeclimate.com/v1/badges/6173dc4387060c58035d/maintainability)](https://codeclimate.com/github/R6API/Client/maintainability)
[![License](https://poser.pugx.org/r6api/client/license)](https://packagist.org/packages/r6api/client)

## Installation
You can install the library via [Composer](https://getcomposer.org/). Run the following command:

```bash
composer require r6api/client
```

To use the library, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once __DIR__. '/vendor/autoload.php';
```

## Getting Started

Simple usage to get someone profile:

```php
require_once __DIR__.'/vendor/autoload.php';

use R6API\Client\ClientBuilder;
use R6API\Client\Api\Type\PlatformType;

$builder = new ClientBuilder();
$builder->setCacheItemPool($cacheItemPool); // accept PSR-6 adapter (not mandatory)
$client = $builder->buildAuthenticated('%email%', '%password%');

// get profile for character called `panda_______`
$response = $client->getProfileApi()->get(PlatformType::PC, 'panda_______');
```
