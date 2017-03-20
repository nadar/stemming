<?php

namespace Nadar\Stemming;

class Stemm
{
    protected static $classMap = [
        '\\Nadar\\Stemming\\Stemms\\GermanStemmer' => ['de', 'ch'],
        '\\Nadar\\Stemming\\Stemms\\EnglishStemmer' => ['en', 'gb'],
    ];
    
    public static function stem($word, $language)
    {
        foreach (static::$classMap as $stemmer => $languages) {
            if (in_array($language, $languages)) {
                return $stemmer::stem($word);
            }
        }
        
        return $word;
    }
}