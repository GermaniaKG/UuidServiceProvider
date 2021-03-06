# Germania KG · UuidServiceProvider

**[Pimple Service Provider](https://pimple.symfony.com/#extending-a-container) for working with Ben Ramsey's [ramsey/uuid](https://packagist.org/packages/ramsey/uuid) package**

[![Packagist](https://img.shields.io/packagist/v/germania-kg/uuidserviceprovider.svg?style=flat)](https://packagist.org/packages/germania-kg/uuidserviceprovider)
[![PHP version](https://img.shields.io/packagist/php-v/germania-kg/uuidserviceprovider.svg)](https://packagist.org/packages/germania-kg/uuidserviceprovider)
[![Build Status](https://img.shields.io/travis/GermaniaKG/UuidServiceProvider.svg?label=Travis%20CI)](https://travis-ci.org/GermaniaKG/UuidServiceProvider)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GermaniaKG/UuidServiceProvider/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/UuidServiceProvider/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/GermaniaKG/UuidServiceProvider/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/UuidServiceProvider/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/GermaniaKG/UuidServiceProvider/badges/build.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/UuidServiceProvider/build-status/master)


## Installation with Composer

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
<?php
$uuid4 = $dic['UUID.new'];
```


### UUID.new.hex

Returns the hex string representation of a ***UUID.new*** object.

```php
<?php
$uuid4_hex = $dic['UUID.new.hex'];
```



### UUID.Factory

Returns a callable that returns UUID object as ***Ramsey\Uuid\Uuid*** instance.

```php
<?php
$factory = $dic['UUID.Factory'];
$uuid4 = $factory();
```

### UUID.HexFactory

Returns a callable that returns the hex string representation of a ***UUID.new*** object.

```php
<?php
$factory = $dic['UUID.HexFactory'];
$uuid4_hex = $factory();
```

## Development

```bash
$ git clone https://github.com/GermaniaKG/UuidServiceProvider.git
$ cd UuidServiceProvider
$ composer install
```

## Unit tests

Either copy `phpunit.xml.dist` to `phpunit.xml` and adapt to your needs, or leave as is. Run [PhpUnit](https://phpunit.de/) test or composer scripts like this:

```bash
$ composer test
# or
$ vendor/bin/phpunit
```

