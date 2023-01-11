<?php

namespace Nadar\Stemming;

/**
 * Stemm Words or Phrase.
 *
 * @author Basil Suter <basil@nadar.io>
 */
class Stemm
{
    protected static $classMap = [
        '\\Nadar\\Stemming\\Stemms\\GermanStemmer' => ['de', 'ch'],
        '\\Nadar\\Stemming\\Stemms\\EnglishStemmer' => ['en', 'gb'],
    ];

    /**
     * @var array A list of words which should be ignored. This list is universal for all languages.
     */
    public static $ignore = ["physics", "mathematics", "geography", "bus"];

    /**
     * Check whether a given word is in the ignored list
     *
     * @param string $word
     * @return boolean
     */
    public static function isIgnored($word)
    {
        $list = array_map(function($item) {
            return strtolower($item);
        }, self::$ignore);

        return in_array(strtolower((string) $word), $list);
    }

    /**
     * Stem a word.
     *
     * If the language could not be found the world will returned.
     *
     * @param string $word The word to stem e.g. `drinking`
     * @param string $language The language to stem with e.g. `de`,`en`
     * @return string The stemmed word, if language not found original input returned.
     */
    public static function stem($word, $language)
    {
        if (empty($language)) {
            return $word;
        }

        if (self::isIgnored($word)) {
            return $word;
        }
        
        foreach (static::$classMap as $stemmer => $languages) {
            if (in_array($language, $languages)) {
                return $stemmer::stem((string) $word);
            }
        }
        
        return $word;
    }
    
    /**
     * Stem a phrase by its words.
     *
     * If the language could not be found the world will returned.
     *
     * @param string $phares The phares to stem e.g. `A drinking drinker`
     * @param string $language The language to stem with e.g. `de`,`en`
     * @return string The stemmed word, if language not found original input returned.
     */
    public static function stemPhrase($phares, $language)
    {
        $words = [];
        foreach (explode(" ", $phares) as $word) {
            $words[] = static::stem($word, $language);
        }
        
        return implode(" ", $words);
    }
}
