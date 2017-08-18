<?php

namespace Tests\Unit;

use ColbyGatte\SimplyRets\ListingSearchQuery;
use Tests\TestCase;

class ListingTest extends TestCase
{
    /** @test */
    public function can_get_random_listing()
    {
        $listings = $this->getClient()->doSearch(
            (new ListingSearchQuery())->minprice(250000)
        );
        
        dump(iterator_to_array($listings));
    }
    
    /** @test */
    public function can_get_single_listing()
    {
        // HERE: test for single listing
    }
}