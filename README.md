# Germania KG · UuidServiceProvider

**[Pimple Service Provider](https://pimple.symfony.com/#extending-a-container) for working with Ben Ramsey's [ramsey/uuid](https://packagist.org/packages/ramsey/uuid) package**


[![Build Status](https://travis-ci.org/GermaniaKG/UuidServiceProvider?branch=master)](https://travis-ci.org/GermaniaKG/UuidServiceProvider)
[![Code Coverage](https://scrutinizer-ci.com/g/GermaniaKG/UuidServiceProvider/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/UuidServiceProvider/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GermaniaKG/UuidServiceProvider/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/UuidServiceProvider/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/GermaniaKG/UuidServiceProvider/badges/build.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/UuidServiceProvider/build-status/master)


## Installation

```bash
$ composer require germania-kg/uuidserviceprovider
```

## Setup

```php
<?php
use Germania\UuidServiceProvider\UuidServiceProvider;

// A. Use with Slim or Pimple
$app = new \Slim\App;
$dic = $app->getContainer();
$dic = new Pimple\Container;

// B. Register Service Provider.
$dic->register( new UuidServiceProvider  );
```


## Services

### UUID.new

Factory: Returns a new version 4 (random) UUID object as ***Ramsey\Uuid\Uuid*** instance.

```php
$uuid4 = $dic['UUID.new'];
```


### UUID.new.hex

Returns the hex string representation of a ***UUID.new*** object.

```php
$uuid4_hex = $dic['UUID.new.hex'];
```


## Unit tests

Either copy `phpunit.xml.dist` to `phpunit.xml` and adapt to your needs, or leave as is. 
Run [PhpUnit](https://phpunit.de/) like this:

```bash
$ vendor/bin/phpunit
```

