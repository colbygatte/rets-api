<?php

namespace Tests\Unit;

use DevDept\Flavin\Sources\SimplyRets\SimplyRetsRetsClient;
use DevDept\Flavin\Sources\SimplyRets\SimplyRetsSearchParameters;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function example_test()
    {
        $results = (new SimplyRetsRetsClient())->doSearch(
            (new SimplyRetsSearchParameters)->bedrooms(4, 5)
        );
        
        foreach ($results as $listing) {
            dump([
                'agent' => $listing->agentFullName,
                'bedrooms' => $listing->bedrooms
            ]);
        }
        
        $this->assertTrue(true);
    }
}