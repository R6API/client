# R6API/Client

## Basic setup

```php
require_once __DIR__.'/vendor/autoload.php';

use R6API\Client\ClientBuilder;

$builder = new ClientBuilder();
$client = $builder->buildAuthenticated('%email%', '%password%');
```
