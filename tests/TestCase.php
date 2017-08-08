<?php

namespace Tests;

use ColbyGatte\Rets\Sources\SimplyRets\SimplyRetsRetsClient;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function setUp()
    {
        parent::setUp();

        // Set up unit tests here
    }
    
    /**
     * @return \ColbyGatte\Rets\Sources\SimplyRets\SimplyRetsRetsClient
     */
    protected function makeSimplyRetsClient()
    {
        return new SimplyRetsRetsClient('simplyrets', 'simplyrets');
    }
}
