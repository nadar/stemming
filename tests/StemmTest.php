<?php

namespace Nadar\Stemming\Tests;


use Nadar\Stemming\Stemm;
use PHPUnit\Framework\TestCase;

class StemmTest extends TestCase
{
    public function testGermanStemm()
    {
        $this->assertSame('trink', Stemm::stem('trinken', 'de'));
    }
    
    public function testEnglishStemm()
    {
        $this->assertSame('drink', Stemm::stem('drinking', 'en'));
    }
}