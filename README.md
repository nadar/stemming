# PHP Stemming Collection

![Tests](https://github.com/nadar/stemming/workflows/Tests/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/nadar/stemming/v/stable)](https://packagist.org/packages/nadar/stemming)
[![Total Downloads](https://poser.pugx.org/nadar/stemming/downloads)](https://packagist.org/packages/nadar/stemming)

The main purpose of this repo is to unify different stemming components based on its language.

## Installation

This package is distributed over the packagist service for composer. In order to use this package composer must be installed.

```sh
composer require nadar/stemming
```

## Usage

Using the stemmer for your desired language:

```php
<?php
include 'vendor/autoload.php';

$stemmed = \Nadar\Stemming\Stemm::stem('drinking', 'en');

echo $stemmed; // output: "drink"
```

If your provided language could not be found, the original word will be returned.

You can also stem a whole phrase:

```php
echo \Nadar\Stemming\Stemm::stemPhrase('I am playing drums', 'en');
```

## Ignore

Certain words are on the ignore list, valid for all languages, see Stemm::$ignore. You can adjust that list with `Stemm::$ignore = ['foo', 'bar']`.

## Librarys Used:

+ German Stemming: https://github.com/arisro/german-stemmer (Copyright (c) 2013 Aris Buzachis (buzachis.aris@gmail.com))
+ English Stemming: https://tartarus.org/martin/PorterStemmer/php.txt (Copyright (c) 2005 Richard Heyes (http://www.phpguru.org/))

## Testing and PR

In order to test the libray run:

```php
./vendor/bin/phpunit tests
```

in order to psr2 fix your code run:

```php
./vendor/bin/php-cs-fixer fix src/
```
