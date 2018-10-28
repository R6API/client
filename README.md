# R6API/Client

[![Latest Stable Version](https://poser.pugx.org/r6api/client/v/stable)](https://packagist.org/packages/r6api/client)
[![Maintainability](https://api.codeclimate.com/v1/badges/6173dc4387060c58035d/maintainability)](https://codeclimate.com/github/R6API/Client/maintainability)
[![License](https://poser.pugx.org/r6api/client/license)](https://packagist.org/packages/r6api/client)

## Installation
You can install the library via [Composer](https://getcomposer.org/). Run the following command:

```bash
composer require r6api/client
```

This will install the client without the needed HTTP client.
We suggest you to install:
- `php-http/curl-client` Simpler if you have no HTTP client on your project.
- `php-http/guzzle6-adapter` If you already use guzzle, I suggest you using this package.

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
```

## Documentation

### Profile
Look for profile of an user called `panda_______`
```php
$profiles = $client->getProfileApi()->get(PlatformType::PC, 'panda_______');
```
| Parameters | Value               | Checks                                                    |
|------------|---------------------|-----------------------------------------------------------|
| `$platform`| Platform to look at | Check \R6API\Client\Api\Type\PlatformType                 |
| `$value`   | Value to search     | No real restrictions here                                 |
| `$key`     | Key to search       | Possible values are: nameOnPlatform, idOnPlatform, userId |

`$profiles` will contains an array of `Profile` model:
```php
class Profile
{
    /**
     * @var \Ramsey\Uuid\Uuid
     */
    public $profileId;

    /**
     * @var \Ramsey\Uuid\Uuid
     */
    public $userId;

    /**
     * @var string
     * @see \R6API\Client\Api\Type\PlatformType
     */
    public $platformType;

    /**
     * @var \Ramsey\Uuid\Uuid
     */
    public $idOnPlatform;

    /**
     * @var string
     */
    public $nameOnPlatform;
}

```

### Progression
Progression for user we searched in Profile example:
```php
$progressions = $client->getProgressionApi()->get(PlatformType::PC, ['575b8c76-a33a-4c19-9618-d14b9343d527']);
```
| Parameters    | Value               | Checks                                                    |
|---------------|---------------------|-----------------------------------------------------------|
| `$platform`   | Platform to look at | Check \R6API\Client\Api\Type\PlatformType                 |
| `$profileIds` | Profiles to search  | Search by `profileId`, each one should be UUID            |

`$progressions` will contains an array of `Progression` model:
```php
class Progression
{
    /**
     * @var int
     */
    public $xp;

    /**
     * @var Uuid
     */
    public $profileId;

    /**
     * @var int
     */
    public $lootboxProbability;

    /**
     * @var int
     */
    public $level;

    public function getLootboxProbabilityPercent(): float;
}
```

### Rank
Rank for user we searched in Profile example:
```php
$response = $client->getRankApi()->get(PlatformType::PC, RegionType::EUROPE, SeasonType::CURRENT, ['575b8c76-a33a-4c19-9618-d14b9343d527']);
```
| Parameters    | Value               | Checks                                                    |
|---------------|---------------------|-----------------------------------------------------------|
| `$platform`   | Platform to look at | Check \R6API\Client\Api\Type\PlatformType                 |
| `$region`     | Region to filter    | Check \R6API\Client\Api\Type\RegionType                   |
| `$season`     | Season to look at   | Check \R6API\Client\Api\Type\SeasonType                   |
| `$profileIds` | Profiles to search  | Search by `profileId`, each one should be UUID            |

`$response` will contains:
```php
class Rank
{
    /**
     * @var string
     */
    public $boardId;

    /**
     * @var int
     */
    public $pastSeasonsAbandons;

    /**
     * @var \DateTime
     */
    public $updateTime;

    /**
     * @var float
     */
    public $skillMean;

    /**
     * @var int
     */
    public $abandons;

    /**
     * @var int
     */
    public $season;

    /**
     * @var string
     */
    public $region;

    /**
     * @var Uuid
     */
    public $profileId;

    /**
     * @var int
     */
    public $pastSeasonsLosses;

    /**
     * @var float
     */
    public $maxMmr;

    /**
     * @var float
     */
    public $mmr;

    /**
     * @var int
     */
    public $wins;

    /**
     * @var float
     */
    public $skillStdev;

    /**
     * @var int
     */
    public $rank;

    /**
     * @var int
     */
    public $losses;

    /**
     * @var int
     */
    public $nextRankMmr;

    /**
     * @var int
     */
    public $pastSeasonsWins;

    /**
     * @var int
     */
    public $previousRankMmr;

    /**
     * @var int
     */
    public $maxRank;

    public function getWinLosseRate(): float;
}
```

### Statistic
Statistic for user we searched in Profile example:
```php
$statistics = [
    StatisticType::CASUAL_TIMEPLAYED,
    StatisticType::CASUAL_MATCHPLAYED,
    StatisticType::CASUAL_MATCHWON,
    StatisticType::CASUAL_MATCHLOSTS,
    StatisticType::CASUAL_KILLS,
    StatisticType::CASUAL_DEATH
];

$response = $client->getStatisticApi()->get(PlatformType::PC, ['575b8c76-a33a-4c19-9618-d14b9343d527'], $statistics);
```
| Parameters    | Value               | Checks                                                       |
|---------------|---------------------|--------------------------------------------------------------|
| `$platform`   | Platform to look at | Check \R6API\Client\Api\Type\PlatformType                    |
| `$profileIds` | Profiles to search  | Search by `profileId`, each one should be UUID               |
| `$statistics` | Statistic to filter | Check \R6API\Client\Api\Type\StatisticType, this is an array |

`$response` will contains:
```
array(1) {
  'results' =>
  array(1) {
    '575b8c76-a33a-4c19-9618-d14b9343d527' =>
    array(6) {
      'casualpvp_matchwon' =>
      int(342)
      'casualpvp_kills' =>
      int(1424)
      'casualpvp_death' =>
      int(1810)
      'casualpvp_matchlost' =>
      int(279)
      'casualpvp_matchplayed' =>
      int(621)
      'casualpvp_timeplayed' =>
      int(506419)
    }
  }
}
```
