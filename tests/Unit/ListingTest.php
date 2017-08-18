<?php

namespace Tests\Unit;

use ColbyGatte\Rets\Sources\SimplyRets\SimplyRetsListingInfo;
use ColbyGatte\Rets\Sources\SimplyRets\SimplyRetsSearchParameters;
use Tests\TestCase;
use function GuzzleHttp\Psr7\build_query;

class ListingTest extends TestCase
{
    /** @test */
    public function can_get_random_listing()
    {
        $listing = $this->getClient()->doSearch(
            (new SimplyRetsSearchParameters)->price(250000, null)
        )->current();
    }
    
    /** @test */
    public function can_get_single_listing()
    {
        // HERE: test for single listing
    }
}