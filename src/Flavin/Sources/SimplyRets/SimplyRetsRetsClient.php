<?php

namespace DevDept\Flavin\Sources\SimplyRets;

use DevDept\Flavin\Interfaces\ListingSearchParametersInterface;
use GuzzleHttp\Client;

class SimplyRetsRetsClient
{
    const API_PROPERTIES = 'https://api.simplyrets.com/properties';
    
    /**
     * @param \DevDept\Flavin\Interfaces\ListingSearchParametersInterface $searchParameters
     *
     * @return \DevDept\Flavin\Sources\SimplyRets\SimplyRetsListingCollection
     */
    public function doSearch(ListingSearchParametersInterface $searchParameters)
    {
        $httpClient = new Client;
    
        $requestUri = static::API_PROPERTIES.'?'.$searchParameters->makeQuery();
    
        $response = $httpClient->get(
            $requestUri,
            ['auth' => ['simplyrets', 'simplyrets']]
        );
    
        return SimplyRetsListingCollection::fromJsonArray(
            $response->getBody()->getContents()
        );
    }
}