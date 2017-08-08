<?php

namespace DevDept\Flavin\Sources\SimplyRets;

use DevDept\Flavin\Interfaces\ListingCollectionInterface;

class SimplyRetsListingCollection extends ListingCollectionInterface
{
    /**
     * @param $jsonArray
     *
     * @return static
     */
    static function createFromJsonArray($jsonArray) {
        $listings = new static;
        
        foreach (json_decode($jsonArray, true) as $json) {
            $listing = new SimplyRetsListingInfo();
            
            // TODO: error handling. this returns a bool on success & false on failure.
            $listing->setInfo($json);
            
            $listings[] = $listing;
        }
        
        return $listings;
    }
}