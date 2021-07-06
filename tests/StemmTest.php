<?php

namespace Nadar\Stemming\Tests;

use luya\base\Boot;
use luya\testsuite\cases\BaseTestSuite;
use Nadar\Stemming\Stemm;

class StemmTest extends BaseTestSuite
{
    public function getConfigArray()
    {
        return [
            'id' => 'mytestapp',
            'basePath' => dirname(__DIR__),
        ];
    }

    public function bootApplication(Boot $boot)
    {
        
    }

    public function testIgnore()
    {
        $this->assertTrue(Stemm::isIgnored('bus'));
        $this->assertTrue(Stemm::isIgnored('BUS'));
        Stemm::$ignore = ['FOO'];
        $this->assertFalse(Stemm::isIgnored('BUS'));
        $this->assertTrue(Stemm::isIgnored('foO'));
    }

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
