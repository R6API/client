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
$response = $client->getProfileApi()->get(PlatformType::PC, 'panda_______');
```
| Parameters | Value               | Checks                                                    |
|------------|---------------------|-----------------------------------------------------------|
| `$platform`| Platform to look at | Check \R6API\Client\Api\Type\PlatformType                 |
| `$value`   | Value to search     | No real restrictions here                                 |
| `$key`     | Key to search       | Possible values are: nameOnPlatform, idOnPlatform, userId |

`$response` will contains:
```
array(1) {
  'profiles' =>
  array(1) {
    [0] =>
    array(5) {
      'profileId' =>
      string(36) "575b8c76-a33a-4c19-9618-d14b9343d527"
      'userId' =>
      string(36) "575b8c76-a33a-4c19-9618-d14b9343d527"
      'platformType' =>
      string(5) "uplay"
      'idOnPlatform' =>
      string(36) "575B8C76-A33A-4C19-9618-D14B9343D527"
      'nameOnPlatform' =>
      string(12) "panda_______"
    }
  }
}
```

### Progression
Progression for user we searched in Profile example:
```php
$response = $client->getProgressionApi()->get(PlatformType::PC, ['575b8c76-a33a-4c19-9618-d14b9343d527']);
```
| Parameters    | Value               | Checks                                                    |
|---------------|---------------------|-----------------------------------------------------------|
| `$platform`   | Platform to look at | Check \R6API\Client\Api\Type\PlatformType                 |
| `$profileIds` | Profiles to search  | Search by `profileId`, each one should be UUID            |

`$response` will contains:
```
array(1) {
  'player_profiles' =>
  array(1) {
    [0] =>
    array(4) {
      'xp' =>
      int(11525)
      'profile_id' =>
      string(36) "575b8c76-a33a-4c19-9618-d14b9343d527"
      'lootbox_probability' =>
      int(1890)
      'level' =>
      int(97)
    }
  }
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
```
array(1) {
  'players' =>
  array(1) {
    '575b8c76-a33a-4c19-9618-d14b9343d527' =>
    array(19) {
      'board_id' =>
      string(10) "pvp_ranked"
      'past_seasons_abandons' =>
      int(0)
      'update_time' =>
      string(32) "2018-08-23T08:02:29.015000+00:00"
      'skill_mean' =>
      double(26.8811438825)
      'abandons' =>
      int(0)
      'season' =>
      int(10)
      'region' =>
      string(4) "emea"
      'profile_id' =>
      string(36) "575b8c76-a33a-4c19-9618-d14b9343d527"
      'past_seasons_losses' =>
      int(13)
      'max_mmr' =>
      double(2830.40072145)
      'mmr' =>
      double(2688.11438825)
      'wins' =>
      int(22)
      'skill_stdev' =>
      double(6.01302559585)
      'rank' =>
      int(13)
      'losses' =>
      int(18)
      'next_rank_mmr' =>
      double(2700)
      'past_seasons_wins' =>
      int(11)
      'previous_rank_mmr' =>
      double(2500)
      'max_rank' =>
      int(14)
    }
  }
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
