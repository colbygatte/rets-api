<?php

namespace ColbyGatte\Rets\Sources\SimplyRets;

use ColbyGatte\Rets\Interfaces\ListingSearchParametersInterface;
use GuzzleHttp\Client;

class SimplyRetsRetsClient
{
    const API_PROPERTIES = 'https://api.simplyrets.com/properties';
    
    protected $user;
    
    protected $pass;
    
    public function __construct($user, $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }
    
    /**
     * @param \ColbyGatte\Rets\Interfaces\ListingSearchParametersInterface $searchParameters
     *
     * @return \ColbyGatte\Rets\Sources\SimplyRets\SimplyRetsListingCollection
     */
    public function doSearch(ListingSearchParametersInterface $searchParameters)
    {
        $httpClient = new Client;
    
        $requestUri = static::API_PROPERTIES.'?'.$searchParameters->makeQuery();
    
        $response = $httpClient->get(
            $requestUri,
            ['auth' => [$this->user, $this->pass]]
        );
    
        return SimplyRetsListingCollection::createFromJsonArray(
            $response->getBody()->getContents()
        );
    }
}