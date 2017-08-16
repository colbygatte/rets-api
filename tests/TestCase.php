<?php

namespace Tests;

use ColbyGatte\Rets\Sources\SimplyRets\SimplyRetsRetsClient;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    static protected $client;
    /**
     * @return \ColbyGatte\Rets\Sources\SimplyRets\SimplyRetsRetsClient
     */
    protected function getClient()
    {
        return static::$client ?: static::$client = new SimplyRetsRetsClient('simplyrets', 'simplyrets');
    }
}
