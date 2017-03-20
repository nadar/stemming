<?php

namespace Nadar\Stemming\Tests;

use Nadar\Stemming\Stemm;
use PHPUnit\Framework\TestCase;

class StemmTest extends TestCase
{
    public function testBaseStemm()
    {
        $this->assertSame('foobar', Stemm::stem('foobar', null));
        $this->assertSame('foobar', Stemm::stem('foobar', 'ch-ch'));
    }
    
    public function testGermanStemm()
    {
        $this->assertSame('trink', Stemm::stem('trinken', 'de'));
        $this->assertSame('trink', Stemm::stem('trinken', 'ch'));
        
        $this->assertSame('ich hab ein trinkend mensch geseh', Stemm::stemPhrase('Ich habe einen trinkenden Menschen gesehen', 'de'));
    }
    
    public function testEnglishStemm()
    {
        $this->assertSame('drink', Stemm::stem('drinking', 'en'));
        $this->assertSame('drink', Stemm::stem('drinking', 'gb'));
        
        $this->assertSame("I saw a drink gui", Stemm::stemPhrase('I saw a drinking guy', 'en'));
    }
}
