<?php

namespace Tests;

use ColbyGatte\SimplyRets\Client;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    static protected $client;
    /**
     * @return Client
     */
    protected function getClient()
    {
        return static::$client ?: static::$client = new Client('simplyrets', 'simplyrets');
    }
}
