# PHP Stemming Collection

The main purpose of this repo is to unify different stemming components based on its language.

## Usage

Using the stemmer for your desired language:

```php
<?php

$stemmed =  \Nadar\Stemming\Stem::word('drinking', 'en');

echo $stemmed; // output: "drink"
```

If your provided language could not be found, the original word will be returned.

## Librarys Used:

+ German Stemming: https://github.com/arisro/german-stemmer (Copyright (c) 2013 Aris Buzachis (buzachis.aris@gmail.com))
+ English Stemming: https://tartarus.org/martin/PorterStemmer/php.txt (Copyright (c) 2005 Richard Heyes (http://www.phpguru.org/))