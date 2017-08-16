<?php

namespace ColbyGatte\Rets\Sources\SimplyRets;

use ColbyGatte\Rets\Interfaces\ListingCollectionInterface;

class SimplyRetsListingCollection extends ListingCollectionInterface
{
    /**
     * @var \GuzzleHttp\Psr7\Response
     */
    protected $response;
    
    /**
     * @param \GuzzleHttp\Psr7\Response $response
     *
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;
        
        return $this;
    }
    
    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getResponse()
    {
        return $this->response;
    }
    
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