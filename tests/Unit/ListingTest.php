<?php

namespace Tests\Unit;

use ColbyGatte\Rets\Sources\SimplyRets\SimplyRetsListingInfo;
use ColbyGatte\Rets\Sources\SimplyRets\SimplyRetsSearchParameters;
use Tests\TestCase;

class ListingTest extends TestCase
{
    /** @test */
    public function can_get_random_listing()
    {
        $client = $this->makeSimplyRetsClient();
        
        $results = $client->doSearch(
            (new SimplyRetsSearchParameters)->price(250000, null)
        );
        
        $listing = $results->current();
        
        $serialized = serialize($listing->getInfo());
        
        $newListing = new SimplyRetsListingInfo;
        $newListing->setDottedInfo(unserialize($serialized));
    
        $this->assertNotEmpty($newListing->getAgentFullName());
    }
}