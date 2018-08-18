# R6API/Client

[![Maintainability](https://api.codeclimate.com/v1/badges/6173dc4387060c58035d/maintainability)](https://codeclimate.com/github/R6API/Client/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/6173dc4387060c58035d/test_coverage)](https://codeclimate.com/github/R6API/Client/test_coverage)

## Basic setup

```php
require_once __DIR__.'/vendor/autoload.php';

use R6API\Client\ClientBuilder;

$builder = new ClientBuilder();
$client = $builder->buildAuthenticated('%email%', '%password%');
```
